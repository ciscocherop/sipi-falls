<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\ContactMessage;

class NewContactMessageNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $contactMessage;

    public function __construct(ContactMessage $contactMessage)
    {
        $this->contactMessage = $contactMessage;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Contact Message — ' . $this->contactMessage->subject,
            // Reply-to the visitor so you can reply directly from your inbox
            replyTo: [
                new \Illuminate\Mail\Mailables\Address(
                    $this->contactMessage->email,
                    $this->contactMessage->first_name . ' ' . $this->contactMessage->last_name
                ),
            ],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.new-contact-message-notification',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
