<?php
// app/Http/Middleware/RequestLogger.php

/* https://laracasts.com/discuss/channels/requests/how-do-i-get-a-clue-to-which-controlleraction-is-route-resolved-to?page=0 */

namespace App\Http\Middleware;

use Closure;

class RequestLogger
{
    public function handle($request, Closure $next)
    {
        \Log::debug('LOGGING REQUEST', [$request]);

        $response = $next($request);

        \Log::debug('LOGGING RESPONSE', [$response]);

        return $response;
    }
}
