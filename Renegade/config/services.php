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
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
    'client_id' => '993834440793899',         // Your GitHub Client ID
    'client_secret' => '3a486fa9b6545e9f99240f272a987811', // Your GitHub Client Secret
    'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],

    'google' => [
    'client_id' => '993834440793899',         // Your GitHub Client ID
    'client_secret' => '3a486fa9b6545e9f99240f272a987811', // Your GitHub Client Secret
    'redirect' => 'http://localhost:8000/login/google/callback',
    ],

];
