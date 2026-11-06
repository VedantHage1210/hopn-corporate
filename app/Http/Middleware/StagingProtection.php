<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Only active when this deployment is staging (APP_ENV=staging or STAGING=true).
 *  - adds "X-Robots-Tag: noindex, nofollow" to every response
 *  - if STAGING_PASSWORD is set, requires HTTP Basic Auth (user: STAGING_USER, default "hopn")
 * Production (neither variable set) is completely unaffected.
 */
class StagingProtection
{
    public function handle(Request $request, Closure $next)
    {
        if (! config('hopn.staging.enabled')) {
            return $next($request);
        }

        $password = config('hopn.staging.password');

        if ($password && ! $request->is('up') && ! $this->authorized($request, (string) config('hopn.staging.user'), (string) $password)) {
            return response('Authentication required.', 401, [
                'WWW-Authenticate' => 'Basic realm="HOPn staging"',
                'X-Robots-Tag'     => 'noindex, nofollow',
            ]);
        }

        $response = $next($request);
        $response->headers->set('X-Robots-Tag', 'noindex, nofollow');

        return $response;
    }

    private function authorized(Request $request, string $user, string $password): bool
    {
        return hash_equals($user, (string) $request->getUser())
            && hash_equals($password, (string) $request->getPassword());
    }
}
