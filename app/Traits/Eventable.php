<?php

namespace App\Traits;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

/**
 * Created by PhpStorm.
 * User: recai.cansiz
 * Date: 13.3.2017
 * Time: 10:14
 */
trait Eventable
{
    public static function bootEventable()
    {
        if(!app()->runningInConsole() ) {
            static::created(function ($record) {

                $event = new Event();
                $event->user_id = Auth::user()->id;
                $event->event = get_called_class() .' Created';
                $record->events()->save($event);
            });

            static::updated(function ($record) {

                $event = new Event();
                $event->user_id = Auth::user()->id;
                $event->event = get_called_class() .' Updated';
                $record->events()->save($event);
            });

            static::deleted(function ($record) {

                $event = new Event();
                $event->user_id = Auth::user()->id;
                $event->event = get_called_class() .' Deleted';
                $record->events()->save($event);
            });
        }
    }

    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }
}