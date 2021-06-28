<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, SparkPost and others. This file provides a sane default
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'github' => [
        'client_id' => env('GITHUB_CLIENT_ID'),
        'client_secret' => env('GITHUB_CLIENT_SECRET'),
        'redirect' => 'http://your-callback-url',
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],
    'google' => [
        'client_id' => '473916773539-7j39re3pubrb5f2bia8ii2s8o80uvls1.apps.googleusercontent.com',
        'client_secret' => 'GXgLpB7y2b9r9Wl27P0HkpQ7',
        'redirect' => 'http://localhost:8000/login/google/callback',
    ],
    'facebook' => [
        'client_id' => '389466525832723',
        'client_secret' => 'f762161f4f3979ac5960828d98e5509f',
        'redirect' => 'http://127.0.0.1:8000/login/callback',
    ],
    

];
