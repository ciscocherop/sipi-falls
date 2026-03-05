<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactMessageController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status'); // 'all', 'read', 'unread'

        $query = ContactMessage::query();

        // Apply search filter
        if ($search) {
            $query->search($search);
        }

        // Apply status filter
        if ($status === 'read') {
            $query->read();
        } elseif ($status === 'unread') {
            $query->unread();
        }

        // Get paginated results
        $messages = $query->latest()
            ->paginate(10)
            ->withQueryString();

        // Get counts for badges
        $unreadCount = ContactMessage::unread()->count();
        $totalCount = ContactMessage::count();

        return Inertia::render('Admin/ContactMessages/Index', [
            'messages' => $messages,
            'filters' => [
                'search' => $search,
                'status' => $status,
            ],
            'counts' => [
                'unread' => $unreadCount,
                'total' => $totalCount,
            ]
        ]);
    }

    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);

        // Mark as read when viewing
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }

        return Inertia::render('Admin/ContactMessages/Show', [
            'message' => $message
        ]);
    }

    public function toggleRead($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->update(['is_read' => !$message->is_read]);

        return redirect()->back()->with('success', 'Message status updated');
    }

    public function destroy($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.contact-messages.index')
            ->with('success', 'Message deleted successfully');
    }
}
