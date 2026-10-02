<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Jobs\SendNewsletterConfirmationJob;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'max:255'],
        ]);

        // Newsletter signups are stored as Leads with type=newsletter so they
        // show up in the existing admin Leads list — no new table needed.
        // GDPR requires double opt-in: the signup is NOT counted as
        // subscribed until the confirmation link is clicked.
        $existing = Lead::where('type', 'newsletter')->where('email', $data['email'])->first();

        if ($existing && $existing->confirmed_at) {
            // Already confirmed — nothing to do, but don't reveal that via a
            // different message (avoids leaking whether an email is on the list).
            return $this->respond($request);
        }

        $locale = app()->getLocale();
        $token  = Str::random(48);

        if ($existing) {
            $existing->update(['confirmation_token' => $token, 'locale' => $locale]);
        } else {
            Lead::create([
                'type'                => 'newsletter',
                'name'                => $data['email'],
                'email'               => $data['email'],
                'source_url'          => $request->headers->get('referer'),
                'locale'              => $locale,
                'confirmation_token'  => $token,
                'utm_source'          => $request->query('utm_source', session('utm_source')),
                'utm_medium'          => $request->query('utm_medium', session('utm_medium')),
                'utm_campaign'        => $request->query('utm_campaign', session('utm_campaign')),
                'status'              => 'new',
            ]);
        }

        $confirmUrl = route('newsletter.confirm', ['token' => $token, 'lang' => $locale]);

        // The signup is already saved above — that must never fail for the
        // visitor. QUEUE_CONNECTION=sync means this dispatch runs the mail
        // send inline; if SMTP has an issue, log it and still return success
        // rather than surfacing a broken "Something went wrong" to them.
        try {
            SendNewsletterConfirmationJob::dispatch($data['email'], $confirmUrl, $locale);
        } catch (\Throwable $e) {
            Log::error('SendNewsletterConfirmationJob dispatch failed', ['error' => $e->getMessage(), 'email' => $data['email']]);
        }

        return $this->respond($request, pending: true);
    }

    public function confirm(string $lang, string $token)
    {
        $lead = Lead::where('type', 'newsletter')->where('confirmation_token', $token)->first();

        if ($lead && !$lead->confirmed_at) {
            $lead->update(['confirmed_at' => now(), 'confirmation_token' => null]);
        }

        return view('public.newsletter.confirmed', [
            'lang'    => $lang,
            'success' => (bool) $lead,
        ]);
    }

    private function respond(Request $request, bool $pending = false)
    {
        $message = $pending
            ? 'Almost there — check your inbox to confirm your subscription.'
            : 'Thanks — you are already subscribed!';

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json(['message' => $message]);
        }

        return back()->with('newsletter_status', $message);
    }
}