<?php

namespace App\Services;

use App\Jobs\SendAdminNotificationJob;
use App\Jobs\SendUserConfirmationJob;
use App\Models\Lead;
use Illuminate\Http\Request;

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
            'utm_source'   => $request->input('utm_source'),
            'utm_medium'   => $request->input('utm_medium'),
            'utm_campaign' => $request->input('utm_campaign'),
            'status'       => 'new',
        ]);

        $leadData = array_merge($validated, [
            'form_type'  => $formType,
            'source_url' => $request->url(),
        ]);

        SendAdminNotificationJob::dispatch($leadData, $formType);
        SendUserConfirmationJob::dispatch($leadData, $formType);

        return $lead;
    }
}
