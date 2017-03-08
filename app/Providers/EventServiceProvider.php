<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\ModelCRUD' => [
            'App\Listeners\CreateLogEntry',
        ],
        'App\Events\UserRegistered' => [
            'App\Listeners\SendActivationEmail',
        ],
        'App\Events\UserRequestedActivationEmail' => [
            'App\Listeners\SendActivationEmail',
        ],
        'App\Events\Social\FacebookAccountWasLinked' => [
            'App\Listeners\Social\SendFacebookLinkedEmail',
        ],
        'App\Events\Social\TwitterAccountWasLinked' => [
            'App\Listeners\Social\SendTwitterLinkedEmail',
        ],
        'App\Events\Social\GoogleAccountWasLinked' => [
            'App\Listeners\Social\SendGoogleLinkedEmail',
        ],


    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
