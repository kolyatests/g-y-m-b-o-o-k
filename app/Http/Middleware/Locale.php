<?php

namespace App\Http\Middleware;

use App;
use Config;
use Closure;
use Session;

class Locale
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
        $rawLocale = Session::get('locale');
        $locale = (in_array($rawLocale, Config::get('app.locales'))) ? $rawLocale : Config::get('app.locale');
        App::setLocale($locale);
        return $next($request);
    }
}
