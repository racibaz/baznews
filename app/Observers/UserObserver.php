<?php

namespace App\Observers;

use App\Events\ModelCRUD;
use App\Events\UserRegistered;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  User $user
     * @return void
     */
    public function created(User $user)
    {
        if ($user->status === 2) {
            $token = $user->activationToken()->create([
                'token' => str_random(128),
            ]);

            event(new UserRegistered($user));
        }
    }


    public function updated(User $user)
    {
        //event(new ModelCRUD(get_class($this), __FUNCTION__, Auth::user()->UserFullName(), $record->id, Auth::user()->getUserIp()));
        event(new ModelCRUD(get_class($this), __FUNCTION__, $user->id, Auth::user()->getUserIp()));
    }


    /**
     * Listen to the User deleting event.
     *
     * @param  User $user
     * @return void
     */
    public function deleting(User $user)
    {
        event(new ModelCRUD(get_class($this), __FUNCTION__, $user->id, Auth::user()->getUserIp()));
    }
}