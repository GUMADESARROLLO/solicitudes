<?php

namespace App\Http\Middleware;

use Closure;
use Log;

class LogRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($request->method() === 'GET') {            
            Log::notice($request->ip() . ' -> '. ' ' . $request->path() . ' / ' . now());
        }

        return $next($request);
    }
}