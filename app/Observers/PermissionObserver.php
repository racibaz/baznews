<?php

namespace App\Observers;

use App\Events\ModelCRUD;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class PermissionObserver
{

    public function created(Permission $user)
    {
        //
    }

    public function updated(Permission $user)
    {
        event(new ModelCRUD(get_class($this), __FUNCTION__, $user->id , Auth::user()->getUserIp()));
    }


    public function deleting(Permission $user)
    {
        event(new ModelCRUD(get_class($this), __FUNCTION__, $user->id , Auth::user()->getUserIp()));
    }
}