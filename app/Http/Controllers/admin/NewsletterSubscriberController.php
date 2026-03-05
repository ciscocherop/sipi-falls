<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use App\Mail\NewsletterBroadcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class NewsletterSubscriberController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $subscribers = NewsletterSubscriber::query()
            ->search($search)
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        $activeCount = NewsletterSubscriber::active()->count();

        return Inertia::render('Admin/NewsletterSubscribers/Index', [
            'subscribers' => $subscribers,
            'activeCount' => $activeCount,
            'filters' => [
                'search' => $search
            ]
        ]);
    }

    public function toggleStatus($id)
    {
        $subscriber = NewsletterSubscriber::findOrFail($id);
        
        $subscriber->status = $subscriber->status === 'active' ? 'unsubscribed' : 'active';
        $subscriber->save();

        return redirect()->back()->with('success', 'Subscriber status updated successfully');
    }

    public function destroy($id)
    {
        $subscriber = NewsletterSubscriber::findOrFail($id);
        $subscriber->delete();

        return redirect()->back()->with('success', 'Subscriber deleted successfully');
    }

    public function compose()
    {
        return Inertia::render('Admin/NewsletterSubscribers/Compose');
    }

    public function send(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'content' => 'required|string'
        ]);

        // Get all active subscribers
        $subscribers = NewsletterSubscriber::active()->get();

        if ($subscribers->isEmpty()) {
            return redirect()->back()->with('error', 'No active subscribers to send to');
        }

        // Send email to each subscriber
        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(
                new NewsletterBroadcast($request->subject, $request->content)
            );
        }

        return redirect()->route('admin.newsletter-subscribers.index')
            ->with('success', "Newsletter sent to {$subscribers->count()} subscribers");
    }
}
