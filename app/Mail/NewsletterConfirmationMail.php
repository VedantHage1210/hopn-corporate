<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewsletterConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly string $confirmUrl,
        public readonly string $emailLocale = 'en',
    ) {}

    public function envelope(): Envelope
    {
        $subjects = [
            'en' => 'Please confirm your HOPn newsletter subscription',
            'de' => 'Bitte bestätigen Sie Ihr HOPn Newsletter-Abonnement',
            'ar' => 'يرجى تأكيد اشتراكك في نشرة HOPn الإخبارية',
        ];

        return new Envelope(
            subject: $subjects[$this->emailLocale] ?? $subjects['en'],
        );
    }

    public function content(): Content
    {
        return new Content(
            html: 'emails.newsletter-confirmation',
            with: ['locale' => $this->emailLocale],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}