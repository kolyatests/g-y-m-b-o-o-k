<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckIsManager
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
        $user = auth()->user();
        if (! $user->IsManager()) {
            return redirect()->route('sport.main');
        }

        return $next($request);
    }
}
