<?php

namespace App\Listeners;

use App\Library\Mail\SendActivationToken;
use Mail;

class SendActivationEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->user)->send(new SendActivationToken($event->user->activationToken));
    }
}
