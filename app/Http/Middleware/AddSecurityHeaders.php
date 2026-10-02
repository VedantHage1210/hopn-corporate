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

        // CSP: allows the app's own assets plus the few third-party hosts the
        // public pages actually use (Google Fonts, analytics placeholder).
        // 'unsafe-inline' is kept for style/script because the app currently
        // relies on inline Alpine.js directives and inline <style> blocks in
        // several Blade views — tightening this further would need those
        // rewritten first.
        $response->headers->set('Content-Security-Policy', implode('; ', [
            "default-src 'self'",
            "script-src 'self' 'unsafe-inline' 'unsafe-eval'",
            "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com",
            "font-src 'self' https://fonts.gstatic.com",
            "img-src 'self' data: https:",
            "connect-src 'self'",
            "frame-ancestors 'self'",
            "base-uri 'self'",
            "form-action 'self'",
        ]));

        return $response;
    }
}