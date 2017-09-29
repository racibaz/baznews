<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\Users\UpdateLastLogin;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/account';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }


    /**
     * The user has been authenticated.
     *
     * user statuses 0 => 'Passive', 1 => 'Active' , 2 => 'Preparing Email Activation', 3 => 'Garbage'
     *
     * @param  \Illuminate\Http\Request $request
     * @param  mixed $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->status == User::PASSIVE) {
            Auth::logout();
            return redirect('/login')->withErrors('Your Account is Passive Mode');

        } elseif ($user->status == User::PREPARING_EMAIL_ACTIVATION) {
            Auth::logout();
            return redirect('/login')->withErrors('Please activate your account. <a href="' . route('auth.activate.resend') . '?email=' . $user->email . '">Resend</a>');

        } elseif ($user->status == User::GARBAGE) {
            Auth::logout();
            return redirect('/login')->withErrors('Hesabınız Silindi.');
        }

        Log::info('logged on.' . ' ID : ' . $user->id . ' email : ' . $user->email . ' name : ' . $user->name);
    }
}
