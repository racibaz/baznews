<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\Models\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id' => '712214338937575',
        'client_secret' => 'e9dbd3bde8ce3249fd843ae1f0b097e3',
        'redirect' => 'http://baznews.app/auth/facebook/callback',
    ],
    'twitter' => [
        'client_id' => 'I5PvsTraru3dGyhI0nOpKxcrl',
        'client_secret' => '2eiPHkfwHUS3Gxc2NCTD57wYsQx9Z13QvxOrMn3TIHLNdcwugs',
        'redirect' => 'http://baznews.app/auth/twitter/callback',
    ],
    'google' => [
        'client_id' => '471848457982-78cl21j4j1imltfpdrahlnob8o645qkm.apps.googleusercontent.com',
        'client_secret' => 'YCYdN2chSeEAveuA2-p-JUtk',
        'redirect' => 'http://baznews.app/auth/google/callback',
    ],



];
