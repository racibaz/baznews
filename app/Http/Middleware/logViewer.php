<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class logViewer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Route::currentRouteName() == "logs" && Auth::user()->can('show-log')) {
            return $next($request);
        }

        $userEmail = Auth::check() ? Auth::user()->email : '';

        \Log::warning('Unauthorized log index page request IP :' . $request->ip() . ' User Email : ' . $userEmail);
        return redirect('/login');
    }
}
