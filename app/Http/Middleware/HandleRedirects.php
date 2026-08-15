<?php

namespace App\Http\Middleware;

use App\Models\Redirect;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class HandleRedirects
{
    /**
     * Checks the incoming request path against the admin-managed redirects
     * table (SEO > Redirects). If an active match is found, issues the
     * configured 301/302 redirect before the request reaches any route.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $path = '/' . ltrim($request->path(), '/');

        // Redirects are looked up frequently (every request), so cache the
        // active set for a short window rather than hitting the DB each time.
        $redirects = Cache::remember('hopn_active_redirects', 300, function () {
            return Redirect::where('is_active', true)->get(['id', 'from_url', 'to_url', 'http_status']);
        });

        $match = $redirects->first(function ($redirect) use ($path) {
            return rtrim($redirect->from_url, '/') === rtrim($path, '/');
        });

        if ($match) {
            $match->increment('hits');
            return redirect($match->to_url, $match->http_status ?: 301);
        }

        return $next($request);
    }
}
