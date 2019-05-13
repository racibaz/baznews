<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

class LaravelFileManager
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
        if (Auth::check() && Auth::user()->can('*-laravelfilemanager')) {
            return $next($request);
        }

        Log::warning('Unauthorized laravelfilemanager file request. uri :' . Route::getCurrentRoute()->uri() . ' : user_id : ' . auth()->user()->getAuthIdentifier() . '  IP :' . auth()->user()->getUserIp());
        return redirect('/login');
    }
}
