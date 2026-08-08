<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Facades\URL;

class NewsletterWelcome extends Mailable
{
    use Queueable, SerializesModels;

    public $subscriber;

    public function __construct(NewsletterSubscriber $subscriber)
    {
        $this->subscriber = $subscriber;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome to the Sipi Falls Newsletter!',
        );
    }

    public function content(): Content
    {
        $unsubscribeUrl = URL::signedRoute(
            'newsletter.unsubscribe',
            ['id' => $this->subscriber->id],
            now()->addDays(30)
        );

        return new Content(
            view: 'emails.newsletter-welcome',
            with: ['unsubscribeUrl' => $unsubscribeUrl],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
