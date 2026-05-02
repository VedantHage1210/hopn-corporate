<?php

namespace App\Jobs;

use App\Mail\UserConfirmationMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendUserConfirmationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;
    public int $backoff = 60;

    public function __construct(
        public readonly array $leadData,
        public readonly string $formType
    ) {}

    public function handle(): void
    {
        Mail::to($this->leadData['email'])->send(new UserConfirmationMail($this->leadData, $this->formType));
    }

    public function failed(\Throwable $exception): void
    {
        \Illuminate\Support\Facades\Log::error('SendUserConfirmationJob failed', [
            'form_type' => $this->formType,
            'lead_email' => $this->leadData['email'] ?? 'unknown',
            'error' => $exception->getMessage(),
        ]);
    }
}
