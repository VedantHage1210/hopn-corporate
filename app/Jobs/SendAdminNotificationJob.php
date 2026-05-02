<?php

namespace App\Jobs;

use App\Mail\AdminNotificationMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendAdminNotificationJob implements ShouldQueue
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
        $adminEmail = config('hopn.admin_email', env('ADMIN_EMAIL', 'admin@hopn.eu'));

        Mail::to($adminEmail)->send(new AdminNotificationMail($this->leadData, $this->formType));
    }

    public function failed(\Throwable $exception): void
    {
        \Illuminate\Support\Facades\Log::error('SendAdminNotificationJob failed', [
            'form_type' => $this->formType,
            'lead_email' => $this->leadData['email'] ?? 'unknown',
            'error' => $exception->getMessage(),
        ]);
    }
}
