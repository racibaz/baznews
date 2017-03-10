<?php

namespace App\Http\Middleware;

use Closure;
use Zizaco\Entrust\Entrust;
use Illuminate\Support\Facades\Auth;

class CheckPerm
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(Auth::check() && Auth::user()->can('index-admin')){
            return $next($request);
        }

        \Log::warning('Unauthorized request IP :' . $request->ip());
        return redirect('/login');
    }
}
