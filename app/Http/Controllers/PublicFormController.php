<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\ContactMessage;
use App\Models\NewsletterSubscriber;

class PublicFormController extends Controller
{
    /**
     * Handle booking form submission
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function booking(Request $request)
    {
        // Validate booking form data
        $validated = $request->validate([
            'fullname'             => ['required', 'string', 'max:255'],
            'email-booking'        => ['required', 'email', 'max:255'],
            'travel-date'          => ['required', 'date'],
            'num_adults'           => ['required', 'integer', 'min:1'],
            'num_children'         => ['nullable', 'integer', 'min:0'],
            'preferred_activities' => ['required', 'string'],
            'budget'               => ['nullable', 'string', 'max:255'],
        ]);

        $email = $validated['email-booking'];

        // Create booking record
        Booking::create([
            'fullname'             => $validated['fullname'],
            'email'                => $email,
            'date_of_travel'       => $validated['travel-date'],
            'num_adults'           => (int) $validated['num_adults'],
            'num_children'         => (int) ($validated['num_children'] ?? 0),
            'preferred_activities' => $validated['preferred_activities'],
            'budget'               => $validated['budget'] ?? null,
        ]);

        $msg = "Booking confirmed! We've sent a confirmation email to {$email}. Our team will contact you soon!";

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
