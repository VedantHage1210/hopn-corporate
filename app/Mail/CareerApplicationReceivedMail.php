<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CareerApplicationReceivedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly array $applicationData,
        public readonly string $jobTitle
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your application to HOPn has been received',
        );
    }

    public function content(): Content
    {
        return new Content(
            html: 'emails.career-application-received',
            text: 'emails.career-application-received-text',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
