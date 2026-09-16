<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'max:255'],
        ]);

        // Newsletter signups are stored as Leads with type=newsletter so they
        // show up in the existing admin Leads list — no new table needed.
        $existing = Lead::where('type', 'newsletter')->where('email', $data['email'])->first();

        if (!$existing) {
            Lead::create([
                'type'       => 'newsletter',
                'name'       => $data['email'],
                'email'      => $data['email'],
                'source_url' => $request->headers->get('referer'),
                'utm_source' => $request->query('utm_source', session('utm_source')),
                'utm_medium' => $request->query('utm_medium', session('utm_medium')),
                'utm_campaign' => $request->query('utm_campaign', session('utm_campaign')),
                'status'     => 'new',
            ]);
        }

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json(['message' => 'Subscribed!']);
        }

        return back()->with('newsletter_status', 'Thanks — you are subscribed!');
    }
}
