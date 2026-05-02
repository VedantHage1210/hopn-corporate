<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CareerApplicationAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly array $applicationData,
        public readonly string $jobTitle
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Job Application: ' . $this->jobTitle,
        );
    }

    public function content(): Content
    {
        return new Content(
            html: 'emails.career-application-admin',
            text: 'emails.career-application-admin-text',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
