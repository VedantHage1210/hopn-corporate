<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly array $leadData,
        public readonly string $formType
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thank you for contacting HOPn',
        );
    }

    public function content(): Content
    {
        return new Content(
            html: 'emails.user-confirmation',
            text: 'emails.user-confirmation-text',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
