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
        'region' => env('SES_REGION', 'us-east-1'),
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
        'client_id' => '443749751829-pi12cn95pnd51usres3di7ahsdleot4p.apps.googleusercontent.com',
        'client_secret' => 'iZkDm8uCaAkAo4l5vGMIXl1s',
        'redirect' => 'http://trackpisode.site/login/google/callback',
    ],

    'vkontakte' => [
        'client_id' => '7019099',
        'client_secret' => 'H8cVeQqNg7BbcOefyuQX',
        'redirect' => 'http://trackpisode.site/login/vkontakte/callback',
    ],

];
