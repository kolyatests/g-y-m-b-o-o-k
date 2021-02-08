<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckIsAdmin
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
        if (Auth::guest()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        if (! $user->isAdmin()) {
            return redirect()->route('sport.main');
        }

        return $next($request);
    }
}
