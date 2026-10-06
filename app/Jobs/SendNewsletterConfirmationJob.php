<?php

namespace App\Jobs;

use App\Mail\NewsletterConfirmationMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendNewsletterConfirmationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;
    public int $backoff = 60;

    public function __construct(
        public readonly string $email,
        public readonly string $confirmUrl,
        public readonly string $locale = 'en',
    ) {}

    public function handle(): void
    {
        Mail::to($this->email)->send(new NewsletterConfirmationMail($this->confirmUrl, $this->locale));
    }

    public function failed(\Throwable $exception): void
    {
        Log::error('SendNewsletterConfirmationJob failed', [
            'email' => $this->email,
            'error' => $exception->getMessage(),
        ]);
    }
}