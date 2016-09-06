<?php

namespace App\Observers;

use App\Events\ModelCRUD;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  User  $user
     * @return void
     */
    public function created(User $user)
    {
        //
    }


    public function updated(User $user)
    {
        //event(new ModelCRUD(get_class($this), __FUNCTION__, Auth::user()->UserFullName(), $record->id, Auth::user()->getUserIp()));
        event(new ModelCRUD(get_class($this), __FUNCTION__, $user->first_name, 111111111, Auth::user()->getUserIp()));
    }


    /**
     * Listen to the User deleting event.
     *
     * @param  User  $user
     * @return void
     */
    public function deleting(User $user)
    {
        event(new ModelCRUD(get_class($this), __FUNCTION__, $user->first_name, 111111111, Auth::user()->getUserIp()));
    }
}