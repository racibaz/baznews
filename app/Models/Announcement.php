<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Announcement extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'order',
        'show_time',
        'is_active'
    ];


    public static function boot()
    {
        parent::boot();

        if(!app()->runningInConsole() ) {
            static::created(function ($user) {

                $event = new Event();
                $event->user_id = Auth::user()->id;
                $event->event = 'Announcement Create';
                $user->events()->save($event);
            });

            static::updated(function ($user) {

                $event = new Event();
                $event->user_id = Auth::user()->id;
                $event->event = 'Announcement Updated';
                $user->events()->save($event);
            });

            static::deleted(function ($user) {

                $event = new Event();
                $event->user_id = Auth::user()->id;
                $event->event = 'Announcement Delete';
                $user->events()->save($event);
            });
        }
    }


    public function groups()
    {
        return $this->belongsToMany('App\Models\Group');
    }

    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }


    public static function validate($input) {
        $rules = array(
            'title'                    => 'required|max:255',
            'order' => 'integer',
        );

        return Validator::make($input, $rules);
    }
    
}
