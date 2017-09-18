<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

class CheckPerm
{

    /**
     * Handle an incoming request.
     *
     * @param $request
     * @param Closure $next
     * @param null $guard
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::check() && Auth::user()->can('index-admin')) {
            return $next($request);
        }

        Log::warning('Unauthorized request. uri :' . Route::getCurrentRoute()->uri() . ' : user_id : ' . auth()->user()->getAuthIdentifier() . '  IP :' . auth()->user()->getUserIp());
        return redirect('/login');
    }
}
