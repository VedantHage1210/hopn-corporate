<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly array $leadData,
        public readonly string $formType
    ) {}

    public function envelope(): Envelope
    {
        $labels = [
            'contact'              => 'New Contact Form Submission',
            'proposal'             => 'New Proposal Request',
            'partner-inquiry'      => 'New Partner Inquiry',
            'training-application' => 'New Training Application',
        ];

        return new Envelope(
            subject: $labels[$this->formType] ?? 'New HOPn Lead',
        );
    }

    public function content(): Content
    {
        return new Content(
            html: 'emails.admin-notification',
            text: 'emails.admin-notification-text',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
