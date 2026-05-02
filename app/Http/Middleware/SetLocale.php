<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->route('lang');

        if (! in_array($locale, ['en', 'de'], true)) {
            $preferred = $request->getPreferredLanguage(['en', 'de']) ?? 'en';
            app()->setLocale($preferred);

            return $next($request);
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
