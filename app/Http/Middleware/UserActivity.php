<?php

namespace App\Http\Middleware;

use Auth;
use Cache;
use Closure;
use Carbon\Carbon;

class UserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $expiresAt = now()->addMinutes(5);
            Cache::put('user-is-online-'.auth()->user()->id, true, $expiresAt);
        }

        return $next($request);
    }
}
