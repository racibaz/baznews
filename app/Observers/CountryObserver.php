<?php

namespace App\Observers;

use App\Events\ModelCRUD;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;

class CountryObserver
{
    public function updated(Country $user)
    {
        event(new ModelCRUD(get_class($this), __FUNCTION__, $user->id, Auth::user()->getUserIp()));
    }


    public function deleting(Country $user)
    {
        event(new ModelCRUD(get_class($this), __FUNCTION__, $user->id, Auth::user()->getUserIp()));
    }
}