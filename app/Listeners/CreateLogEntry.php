<?php

namespace App\Listeners;

use App\Events\ModelCRUD;
use Illuminate\Support\Facades\Log;

class CreateLogEntry
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
     * @param  ModelCRUD $event
     * @return void
     */
    public function handle(ModelCRUD $event)
    {
        Log::info('class : ' . $event->modelName . ' function :' . $event->methodName . ' user_id ' . $event->userFullName . ' - IP :' . $event->userIp);
    }
}
