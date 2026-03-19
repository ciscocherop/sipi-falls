<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Booking;
use App\Models\NewsletterSubscriber;
use App\Models\User;
use Inertia\Inertia;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Calculate total counts
        $totalMessages = ContactMessage::count();
        $totalBookings = Booking::count();
        $totalSubscribers = NewsletterSubscriber::where('status', 'active')->count();
        $totalUsers = User::where('is_admin', true)->count();

        // Calculate counts for last 30 days
        $thirtyDaysAgo = Carbon::now()->subDays(30);
        $recentMessages = ContactMessage::where('created_at', '>=', $thirtyDaysAgo)->count();
        $recentBookings = Booking::where('created_at', '>=', $thirtyDaysAgo)->count();

        // Generate chart data for last 7 days
        $sevenDaysAgo = Carbon::now()->subDays(7);
        $chartData = [];
        
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $chartData[] = [
                'date' => $date->format('M j'),
                'messages' => ContactMessage::whereDate('created_at', $date)->count(),
                'bookings' => Booking::whereDate('created_at', $date)->count(),
            ];
        }

        // Fetch 5 most recent contact messages and bookings
        $recentContactMessages = ContactMessage::latest()
            ->take(5)
            ->get(['id', 'first_name', 'last_name', 'email', 'subject', 'created_at', 'is_read'])
            ->map(function ($message) {
                return [
                    'id' => $message->id,
                    'fullname' => $message->first_name . ' ' . $message->last_name,
                    'email' => $message->email,
                    'subject' => $message->subject,
                    'created_at' => $message->created_at,
                    'is_read' => $message->is_read,
                ];
            });

        $recentBookingsList = Booking::latest()
            ->take(5)
            ->get(['id', 'fullname', 'email', 'date_of_travel', 'status', 'created_at']);

        return Inertia::render('Admin/Dashboard', [
            'stats' => [
                'totalMessages' => $totalMessages,
                'totalBookings' => $totalBookings,
                'totalSubscribers' => $totalSubscribers,
                'totalUsers' => $totalUsers,
                'recentMessages' => $recentMessages,
                'recentBookings' => $recentBookings,
            ],
            'chartData' => $chartData,
            'recentActivity' => [
                'messages' => $recentContactMessages,
                'bookings' => $recentBookingsList,
            ]
        ]);
    }

    public function notifications()
    {
        $pendingTestimonials = \App\Models\Testimonial::where('is_approved', false)->where('is_active', true)->count();
        $newBookings = \App\Models\Booking::where('status', 'pending')->count();
        $newMessages = \App\Models\ContactMessage::where('is_read', false)->count();

        return response()->json([
            'pending_testimonials' => $pendingTestimonials,
            'new_bookings'         => $newBookings,
            'new_messages'         => $newMessages,
            'total'                => $pendingTestimonials + $newBookings + $newMessages,
        ]);
    }
}