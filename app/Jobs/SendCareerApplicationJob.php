<?php

namespace App\Jobs;

use App\Mail\CareerApplicationAdminMail;
use App\Mail\CareerApplicationReceivedMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendCareerApplicationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;
    public int $backoff = 60;

    public function __construct(
        public readonly array $applicationData,
        public readonly string $jobTitle
    ) {}

    public function handle(): void
    {
        $adminEmail = config('hopn.admin_email', env('ADMIN_EMAIL', 'admin@hopn.eu'));

        // Notify applicant
        Mail::to($this->applicationData['email'])
            ->send(new CareerApplicationReceivedMail($this->applicationData, $this->jobTitle));

        // Notify HR admin
        Mail::to($adminEmail)
            ->send(new CareerApplicationAdminMail($this->applicationData, $this->jobTitle));
    }

    public function failed(\Throwable $exception): void
    {
        \Illuminate\Support\Facades\Log::error('SendCareerApplicationJob failed', [
            'job_title'   => $this->jobTitle,
            'applicant'   => $this->applicationData['email'] ?? 'unknown',
            'error'       => $exception->getMessage(),
        ]);
    }
}
