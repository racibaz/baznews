<?php

namespace App\Observers;

use App\Events\ModelCRUD;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class RoleObserver
{

    public function created(Role $user)
    {
        event(new ModelCRUD(get_class($this), __FUNCTION__, $user->id, Auth::user()->getUserIp()));
    }


    public function updated(Role $user)
    {
        event(new ModelCRUD(get_class($this), __FUNCTION__, $user->id, Auth::user()->getUserIp()));
    }


    public function deleting(Role $user)
    {
        event(new ModelCRUD(get_class($this), __FUNCTION__, $user->id, Auth::user()->getUserIp()));
    }
}