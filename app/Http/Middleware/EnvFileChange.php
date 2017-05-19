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

        $userEmail = Auth::check() ?  Auth::user()->email : '';

        \Log::warning('Unauthorized .env file request IP :' . $request->ip() . ' User Email : '. $userEmail);
        return redirect('/login');
    }
}
