<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     * Bij activatie wordt de user terug gestuurd als er al is ingelogd.
     * Dan zou er dus geen nieuwe gebruiker kunnen worden gemaakt wanneer er is ingelogd
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if (Auth()->user()->rol == 0 && $request->getPathInfo() == '/register') {
                return $next($request);
            }
            return redirect('/');
        }
        return $next($request);
    }
}
