<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

/**
 * Cloudflare Turnstile check for public form POSTs.
 *
 * Does nothing until TURNSTILE_SECRET_KEY is configured, so deploying this code
 * cannot block any form. The honeypot field and rate limits keep working either way.
 * If Cloudflare itself cannot be reached, the request is let through (and logged),
 * so an outage there never takes the contact forms down.
 */
class VerifyTurnstile
{
    public function handle(Request $request, Closure $next): Response
    {
        $secret = config('hopn.turnstile.secret_key');

        if (! $secret || ! $request->isMethod('post')) {
            return $next($request);
        }

        $token = (string) $request->input('cf-turnstile-response', '');

        if ($token === '') {
            return $this->reject($request);
        }

        try {
            $result = Http::asForm()->timeout(5)->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                'secret'   => $secret,
                'response' => $token,
                'remoteip' => $request->ip(),
            ]);

            if ($result->successful() && $result->json('success') !== true) {
                return $this->reject($request);
            }
        } catch (\Throwable $e) {
            Log::warning('Turnstile verification unavailable: ' . $e->getMessage());
        }

        return $next($request);
    }

    private function reject(Request $request): Response
    {
        $lang = $request->route('lang', 'en');
        $message = match ($lang) {
            'de' => 'Die Spam-Prüfung ist fehlgeschlagen. Bitte versuchen Sie es erneut.',
            'ar' => 'فشل التحقق من الحماية من الرسائل المزعجة. يرجى المحاولة مرة أخرى.',
            default => 'The spam check failed. Please try again.',
        };

        if ($request->expectsJson()) {
            return response()->json(['message' => $message, 'errors' => ['email' => [$message]]], 422);
        }

        return back()->withInput()->withErrors(['turnstile' => $message]);
    }
}
