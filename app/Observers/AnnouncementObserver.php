<?php

namespace App\Observers;

use App\Events\ModelCRUD;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;

class AnnouncementObserver
{

    public function created(Announcement $user)
    {
        event(new ModelCRUD(get_class($this), __FUNCTION__, $user->id, Auth::user()->getUserIp()));
    }

    public function updated(Announcement $user)
    {
        event(new ModelCRUD(get_class($this), __FUNCTION__, $user->id, Auth::user()->getUserIp()));
    }


    public function deleting(Announcement $user)
    {
        event(new ModelCRUD(get_class($this), __FUNCTION__, $user->id, Auth::user()->getUserIp()));
    }
}