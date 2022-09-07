<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
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

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook' => [
        'client_id' => env('FACEBOOK_ACCESS_KEY_ID'),
        'client_secret' => env('FACEBOOK_SECRET_ACCESS_KEY'),
        'redirect' => 'https://blog.dream-creators.com/auth/callback/facebook',
    ],
    'google' => [
        'client_id' => env('GOOGLE_ACCESS_KEY_ID'),
        'client_secret' => env('GOOGLE_SECRET_ACCESS_KEY'),
        'redirect' => 'https://blog.dream-creators.com/auth/callback/google',
    ],
    'github' => [
        'client_id' => env('GITHUB_ACCESS_KEY_ID'),
        'client_secret' => env('GITHUB_SECRET_ACCESS_KEY'),
        'redirect' => 'https://blog.dream-creators.com/auth/callback/github',
    ],
    'discord' => [
        'client_id' => env('DISCORD_ACCESS_KEY_ID'),
        'client_secret' => env('DISCORD_SECRET_ACCESS_KEY'),
        'redirect' => 'https://blog.dream-creators.com/auth/callback/discord',
    ],

];
