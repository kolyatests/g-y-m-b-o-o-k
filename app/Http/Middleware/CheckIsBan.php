<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckIsBan
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
        if ($user->isBan()) {
            Auth::logout();

            return redirect()->route('login')->withErrors(['alert' => 'Вы забанены!']);
        }

        return $next($request);
    }
}
