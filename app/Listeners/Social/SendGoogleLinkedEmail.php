<?php

namespace App\Listeners\Social;

use App\Events\Social\GoogleAccountWasLinked;
use App\Mail\Social\GoogleAccountLinked;
use Mail;


class SendGoogleLinkedEmail
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
     * @param  GoogleAccountWasLinked $event
     * @return void
     */
    public function handle(GoogleAccountWasLinked $event)
    {
        Mail::to($event->user)->send(new GoogleAccountLinked($event->user));
    }
}
