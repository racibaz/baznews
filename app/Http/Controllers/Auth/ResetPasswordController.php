<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get the response for a successful password reset.
     *
     * @param  string $response
     * @return \Illuminate\Http\Response
     */
    protected function sendResetResponse($response)
    {
        if ($this->guard()->user()->status === User::PREPARING_EMAIL_ACTIVATION || $this->guard()->user()->status === User::GARBAGE) {
            $this->guard()->logout();
            return redirect('/login')->withInfo('Your password has been changed but you still need to activate.');
        }

        return redirect($this->redirectPath())->with('status', trans($response));
    }
}
