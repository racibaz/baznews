<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EnvFileChange
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
        if(Auth::check() && Auth::user()->can('changes-env')){
            return $next($request);
        }

        \Log::warning('Unauthorized request IP :' . $request->ip());
        return response('Unauthorized.', 401);
    }
}
