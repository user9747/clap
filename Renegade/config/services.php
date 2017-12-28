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

    
    'google' => [
    'client_id' => '493534719273-7edqq5va6uegev6i687ver91uhkh702q.apps.googleusercontent.com',         // Your GitHub Client ID
    'client_secret' => 'XbHpFjuOGh1gBLg2VkhMv62R', // Your GitHub Client Secret
    'redirect' => 'http://127.0.0.1:8000/login/google/callback',
    ],

    'facebook' => [
        'client_id' => '1657608050971549',
        'client_secret' => 'bf98d1669a8554325b4bcd141ab0b0ff',
        'redirect' => 'http://renegadecet.ml/login/facebook/callback',]

];
