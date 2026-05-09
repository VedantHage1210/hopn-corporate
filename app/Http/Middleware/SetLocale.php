<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->route('lang');
        if (! in_array($locale, ['en', 'de', 'ar'], true)) {
            $preferred = $request->getPreferredLanguage(['en', 'de', 'ar']) ?? 'en';
            app()->setLocale($preferred);
            return $next($request);
        }
        app()->setLocale($locale);
        return $next($request);
    }
}
