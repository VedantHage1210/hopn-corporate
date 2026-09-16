<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Captures utm_source/utm_medium/utm_campaign (plus utm_term/utm_content)
 * the first time a visitor arrives with them in the URL, and keeps them in
 * session for the rest of the visit. Without this, UTM attribution only
 * worked if the person filled out a form on the exact landing page — any
 * click-through to another page before converting silently dropped it.
 *
 * First-touch: an existing session value is never overwritten by a later
 * page hit, so the original campaign that brought the visitor in is what
 * gets credited, not whichever link they clicked last.
 */
class CaptureUtmParameters
{
    private const KEYS = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'];

    public function handle(Request $request, Closure $next)
    {
        foreach (self::KEYS as $key) {
            if ($request->query($key) && !session()->has($key)) {
                session([$key => $request->query($key)]);
            }
        }

        return $next($request);
    }
}
