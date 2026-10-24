<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Adds standard defensive HTTP headers to every response. None of these
 * change how the application behaves - they only tell the browser to be
 * stricter about how it's allowed to render/handle the page, which closes
 * off a few common attack classes (clickjacking, MIME-type sniffing).
 */
class AddSecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=()');

        // HSTS: only meaningful once the site is reliably served over HTTPS
        // (true on Railway/production). Skip it locally so http://*.test
        // development URLs aren't forced to https by the browser.
        if (app()->environment('production')) {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        }

        // CSP: the app's own assets only (fonts are self-hosted). Hosts for the optional
        // analytics and Turnstile integrations are added only when those are configured.
        // 'unsafe-inline' is kept for style/script because the app currently relies on
        // inline Alpine.js directives and inline <style> blocks in several Blade views.
        $scriptSrc = ["'self'", "'unsafe-inline'", "'unsafe-eval'"];
        $connectSrc = ["'self'"];
        $frameSrc = ["'self'"];

        if (config('hopn.analytics.plausible_domain')) {
            $analyticsHost = parse_url((string) config('hopn.analytics.plausible_script'), PHP_URL_SCHEME) . '://' . parse_url((string) config('hopn.analytics.plausible_script'), PHP_URL_HOST);
            $scriptSrc[] = $analyticsHost;
            $connectSrc[] = $analyticsHost;
        }

        if (config('hopn.turnstile.site_key')) {
            $scriptSrc[] = 'https://challenges.cloudflare.com';
            $frameSrc[] = 'https://challenges.cloudflare.com';
            $connectSrc[] = 'https://challenges.cloudflare.com';
        }

        $response->headers->set('Content-Security-Policy', implode('; ', [
            "default-src 'self'",
            'script-src ' . implode(' ', $scriptSrc),
            "style-src 'self' 'unsafe-inline'",
            "font-src 'self' data:",
            "img-src 'self' data: https:",
            'connect-src ' . implode(' ', $connectSrc),
            'frame-src ' . implode(' ', $frameSrc),
            "frame-ancestors 'self'",
            "base-uri 'self'",
            "form-action 'self'",
        ]));

        return $response;
    }
}