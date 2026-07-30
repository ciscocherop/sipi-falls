<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\ContactMessage;
use App\Models\NewsletterSubscriber;
use App\Mail\BookingRequestReceived;
use Illuminate\Support\Facades\Mail;

class PublicFormController extends Controller
{
    /**
     * Handle booking form submission
     */
    public function booking(Request $request)
    {
        $validated = $request->validate([
            'fullname'               => ['required', 'string', 'max:255'],
            'email-booking'          => ['required', 'email', 'max:255'],
            'travel-date'            => ['required', 'date'],
            'num_adults'             => ['required', 'integer', 'min:1'],
            'num_children'           => ['nullable', 'integer', 'min:0'],
            'preferred_activities'   => ['required', 'array', 'min:1'],
            'preferred_activities.*' => ['string'],
        ]);

        $email = $validated['email-booking'];

        $booking = Booking::create([
            'fullname'             => $validated['fullname'],
            'email'                => $email,
            'date_of_travel'       => $validated['travel-date'],
            'num_adults'           => (int) $validated['num_adults'],
            'num_children'         => (int) ($validated['num_children'] ?? 0),
            'preferred_activities' => is_array($validated['preferred_activities'])
                ? implode(', ', $validated['preferred_activities'])
                : $validated['preferred_activities'],
            'budget'               => null,
        ]);

        // Send acknowledgment email to customer
        try {
            Mail::to($email)->send(new BookingRequestReceived($booking));
        } catch (\Exception $e) {
            \Log::error('Failed to send booking request email: ' . $e->getMessage());
        }

        $msg = "Your booking request has been received! Check your email for a confirmation, and our team will be in touch shortly to finalize payment.";

        return redirect()
            ->route('contact')
            ->with('status', 'success')
            ->with('msg', $msg)
            ->with('form', 'booking');
    }   
    /**
     * Handle contact form submission
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function contact(Request $request)
    {
        // Validate contact form data
        $validated = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname'  => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email', 'max:255'],
            'subject'   => ['required', 'string', 'max:255'],
            'message'   => ['required', 'string'],
        ]);

        // Save contact message
        ContactMessage::create([
            'first_name' => $validated['firstname'],
            'last_name'  => $validated['lastname'],
            'email'      => $validated['email'],
            'subject'    => $validated['subject'],
            'message'    => $validated['message'],
        ]);

        return redirect()
            ->route('contact')
            ->with('status', 'success')
            ->with('msg', "Thank you! Your message has been sent successfully. We'll get back to you soon!");
    }

    /**
     * Handle newsletter subscription
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function newsletter(Request $request)
    {
        // Validate email and ensure it's unique
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:255', 'unique:newsletter_subscribers,email'],
        ]);

        // Create newsletter subscription
        NewsletterSubscriber::create([
            'email' => $validated['email'],
        ]);

        return back()
            ->with('status', 'success')
            ->with('msg', 'Thank you for subscribing!');
    }
}
