<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Mail\BookingStatusUpdated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status'); // 'all', 'pending', 'confirmed', 'cancelled'

        $query = Booking::query();

        // Apply search filter
        if ($search) {
            $query->search($search);
        }

        // Apply status filter
        if ($status && $status !== 'all') {
            $query->status($status);
        }

        // Get paginated results
        $bookings = $query->latest()
            ->paginate(10)
            ->withQueryString();

        // Get counts for badges
        $pendingCount = Booking::where('status', 'pending')->count();
        $confirmedCount = Booking::where('status', 'confirmed')->count();
        $cancelledCount = Booking::where('status', 'cancelled')->count();
        $totalCount = Booking::count();

        return Inertia::render('Admin/Bookings/Index', [
            'bookings' => $bookings,
            'filters' => [
                'search' => $search,
                'status' => $status,
            ],
            'counts' => [
                'pending' => $pendingCount,
                'confirmed' => $confirmedCount,
                'cancelled' => $cancelledCount,
                'total' => $totalCount,
            ]
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled'
        ]);

        $booking = Booking::findOrFail($id);
        $oldStatus = $booking->status;
        
        // Update status
        $booking->update(['status' => $request->status]);

        // Send email notification to customer
        try {
            Mail::to($booking->email)->send(new BookingStatusUpdated($booking, $oldStatus));
        } catch (\Exception $e) {
            // Log error but don't fail the request
            \Log::error('Failed to send booking status email: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Booking status updated and email sent to customer');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking deleted successfully');
    }
}
