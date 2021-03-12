<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if ($request->segment(1) == 'admin'){
            return $next($request);

        }

        if ( is_null($request->segment(1)) || ! array_key_exists($request->segment(1) , config('locales.languages'))) {

            return redirect()->to(config('locales.fallback_locale'));
        }

        return $next($request);
    }
}
