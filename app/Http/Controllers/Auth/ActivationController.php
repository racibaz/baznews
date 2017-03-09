<?php

namespace App\Http\Controllers\Auth;

use App\Models\ActivationToken;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\UserRequestedActivationEmail;

class ActivationController extends Controller
{
    public function activate(ActivationToken $token)
    {
        $token->user()->update([
            'status' => 1
        ]);

        $token->delete();

        Auth::login($token->user);

        return redirect('/home');
    }

    public function resend(Request $request)
    {
        $user = User::byEmail($request->email)->firstOrFail();

        if ($user->status === 0 || $user->status === 1) {
            return redirect('/');
        }

        event(new UserRequestedActivationEmail($user));

        return redirect('/login')->withInfo('Activation email resent.');
    }
}
