<?php

namespace App\Listeners;

use App\Events\ModelCRUD;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
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
     * @param  ModelCRUD  $event
     * @return void
     */
    public function handle(ModelCRUD $event)
    {
        //Log::info('yeni log');
        Log::info('class : ' . $event->modelName . ' function :' . $event->methodName  . ' Kişi : ' . $event->userFullName . ' Kayıt ID : ' . $event->recordId . ' - IP :' . $event->userIp );
        //Log::info('class : ' . get_class($this) . ' function :' . __FUNCTION__ . ' Kişi : ' . Auth::user()->UserFullName() . ' Kayıt ID : ' . $record->id . ' - IP :' . Auth::user()->getUserIp());
    }
}
