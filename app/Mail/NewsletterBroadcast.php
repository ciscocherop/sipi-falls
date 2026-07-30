<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Facades\URL;

class NewsletterBroadcast extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $emailSubject;
    public $content;
    public $subscriber;

    public function __construct(string $subject, string $content, NewsletterSubscriber $subscriber)
    {
        $this->emailSubject = $subject;
        $this->content      = $content;
        $this->subscriber   = $subscriber;
    }

    public function build()
    {
        $contactInfo = \App\Models\SiteContent::where('page', 'contact')
            ->pluck('value', 'key');

        // Generate a signed URL unique to this subscriber — no login required
        $unsubscribeUrl = URL::signedRoute(
            'newsletter.unsubscribe',
            ['id' => $this->subscriber->id],
            now()->addDays(30)
        );

        return $this->subject($this->emailSubject)
                    ->view('emails.newsletter-broadcast')
                    ->with([
                        'contactInfo'    => $contactInfo,
                        'unsubscribeUrl' => $unsubscribeUrl,
                    ]);
    }
}
