<?php

namespace App\Observers;

use App\Events\ModelCRUD;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;

class GroupObserver
{
//    public function created(Group $user)
//    {
//        event(new ModelCRUD(get_class($this), __FUNCTION__, $user->id , Auth::user()->getUserIp()));
//    }
//    public function updated(Group $user)
//    {
//        event(new ModelCRUD(get_class($this), __FUNCTION__, $user->id , Auth::user()->getUserIp()));
//    }
//
//    public function deleting(Group $user)
//    {
//        event(new ModelCRUD(get_class($this), __FUNCTION__, $user->id , Auth::user()->getUserIp()));
//    }
}