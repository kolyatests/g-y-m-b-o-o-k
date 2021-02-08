<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ConfirmEmail
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        if (!$user->isVerified()) {
            auth()->logout();

            return redirect()->route('login')->with(['warning' => 'Проверьте и подтвердите вашу почту']);
        }

        return $next($request);
    }
}
