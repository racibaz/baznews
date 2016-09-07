<?php

namespace App\Observers;

use App\Events\ModelCRUD;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CountryObserver
{

    public function created(Country $user)
    {
        //
    }


    public function updated(Country $user)
    {
        //event(new ModelCRUD(get_class($this), __FUNCTION__, Auth::user()->UserFullName(), $record->id, Auth::user()->getUserIp()));
        event(new ModelCRUD(get_class($this), __FUNCTION__, $user->id , Auth::user()->getUserIp()));
    }


    public function deleting(Country $user)
    {
        event(new ModelCRUD(get_class($this), __FUNCTION__, $user->id , Auth::user()->getUserIp()));
    }
}