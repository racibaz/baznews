<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

class EnvFileChange
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::check() && Auth::user()->can('changes-env')) {
            return $next($request);
        }

        Log::warning('Unauthorized .env file request. uri :' . Route::getCurrentRoute()->uri() . ' : user_id : ' . auth()->user()->getAuthIdentifier() . '  IP :' . auth()->user()->getUserIp());
        return redirect('/login');
    }
}
