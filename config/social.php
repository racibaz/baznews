<?php

return [

    'services' => [


        'facebook' => [
            'name' => 'Facebook',
        ],

        'twitter' => [
            'name' => 'Twitter',
        ],

        'google' => [
            'name' => 'Google',
        ],

    ],

    'events' => [

        'facebook' => [

            'created' => \App\Events\Social\FacebookAccountWasLinked::class,

        ],

        'twitter' => [

            'created' => \App\Events\Social\TwitterAccountWasLinked::class,

        ],

        'google' => [

            'created' => \App\Events\Social\GoogleAccountWasLinked::class,

        ],

    ],
    
];
