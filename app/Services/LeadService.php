<?php

namespace App\Services;

use App\Jobs\SendAdminNotificationJob;
use App\Jobs\SendUserConfirmationJob;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LeadService
{
    /**
     * Store a lead from any public form and dispatch notification jobs.
     */
    public function store(array $validated, string $formType, Request $request): Lead
    {
        $lead = Lead::create([
            'type'         => $formType,
            'name'         => $validated['name'],
            'email'        => $validated['email'],
            'phone'        => $validated['phone'] ?? null,
            'company'      => $validated['company'] ?? null,
            'message'      => $validated['message'] ?? null,
            'source_url'   => $request->url(),
            'locale'       => app()->getLocale(),
            'utm_source'   => $request->input('utm_source', session('utm_source')),
            'utm_medium'   => $request->input('utm_medium', session('utm_medium')),
            'utm_campaign' => $request->input('utm_campaign', session('utm_campaign')),
            'status'       => 'new',
        ]);

        $leadData = array_merge($validated, [
            'form_type'  => $formType,
            'source_url' => $request->url(),
            'locale'     => app()->getLocale(),
        ]);

        // The lead is already saved above — that's the part that must never
        // fail for the visitor. Email delivery (QUEUE_CONNECTION=sync means
        // this runs inline, in-request) is best-effort: if SMTP is down or
        // misconfigured, log it and let the form submission still succeed
        // instead of showing the visitor a broken "Something went wrong".
        try {
            SendAdminNotificationJob::dispatch($leadData, $formType);
        } catch (\Throwable $e) {
            Log::error('SendAdminNotificationJob dispatch failed', ['error' => $e->getMessage(), 'lead_id' => $lead->id]);
        }

        try {
            SendUserConfirmationJob::dispatch($leadData, $formType);
        } catch (\Throwable $e) {
            Log::error('SendUserConfirmationJob dispatch failed', ['error' => $e->getMessage(), 'lead_id' => $lead->id]);
        }

        return $lead;
    }
}