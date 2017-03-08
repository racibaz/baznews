<?php

namespace App\Listeners\Social;

use App\Events\Social\FacebookAccountWasLinked;
use App\Mail\Social\FacebookAccountLinked;
use Mail;

class SendFacebookLinkedEmail
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
     * @param  FacebookAccountWasLinked  $event
     * @return void
     */
    public function handle(FacebookAccountWasLinked $event)
    {
        Mail::to($event->user)->send(new FacebookAccountLinked($event->user));
    }
}
