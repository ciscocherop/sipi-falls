<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicFormController extends Controller
{
    //
     public function booking(Request $request)
    {
        // validate + save booking + redirect
    // validate using your exact input names
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
        ->route('contact') // since your form returns to contact.html
        ->with('status', 'success')
        ->with('msg', $msg)
        ->with('form', 'booking'); // optional: helps you open the booking tab/section
    }   
    

    public function contact(Request $request)
    {
        // validate + save/send message + redirect
        $validated = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname'  => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email', 'max:255'],
            'subject'   => ['required', 'string', 'max:255'],
            'message'   => ['required', 'string'],
        ]);

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

    public function newsletter(Request $request)
    {
        // validate + save email + redirect
        $validated = $request->validate([
        'email' => ['required', 'email', 'max:255', 'unique:newsletter_subscribers,email'],
    ]);

    NewsletterSubscriber::create([
        'email' => $validated['email'],
    ]);

    //NewsletterSubscriber::firstOrCreate(['email' => $validated['email']]);

    return back()->with('status', 'success')->with('msg', 'Thank you for subscribing!');

    }
}
