<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserRequestedActivationEmail;
use App\Http\Controllers\Controller;
use App\Models\ActivationToken;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class ActivationController extends Controller
{
    public function activate(ActivationToken $token)
    {
        $token->user()->update([
            'status' => User::ACTIVE
        ]);

        $token->delete();

        Auth::login($token->user);

        return redirect('/login');
    }

    public function resend(Request $request)
    {
        $user = User::byEmail($request->email)->firstOrFail();

        switch ($user->status)
        {
            case User::PASSIVE:
                return redirect('/');
                break;
            case User::ACTIVE:
                return redirect('/');
                break;
            case User::PREPARING_EMAIL_ACTIVATION:
                return redirect('/');
            //todo logic düzeyde bakılacak.
            case User::GARBAGE:
                event(new UserRequestedActivationEmail($user));
                break;
        }

        event(new UserRequestedActivationEmail($user));

        return redirect('/login')->withInfo('Activation email resent.');
    }
}
