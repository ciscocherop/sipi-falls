<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use App\Models\Booking;

class NewBookingNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Booking Request — ' . $this->booking->fullname,
            // Reply directly to the guest from your inbox
            replyTo: [
                new Address($this->booking->email, $this->booking->fullname),
            ],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.new-booking-notification',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
