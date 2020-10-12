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

    'google' => [
        'client_id' => '416833770553-214l3pbcer0toaor9b2tlmjq978ucmad.apps.googleusercontent.com',
        'client_secret' => 'jgPwW3sQRg2DQATNF63bFUkM',
        'redirect' => 'http://localhost/Project/Kelas_Online/Udemy/ANIGASTORE2/callback/google',
        // 'redirect' => 'http://127.0.0.1:8000/callback/google',
    ], 

    'facebook' => [
        'client_id' => '713944736135112',
        'client_secret' => '750d3a2a5d937ea6f12443dbafecfde3',
        'redirect' => 'http://localhost/Project/Kelas_Online/Udemy/ANIGASTORE2/callback/facebook',
        // 'redirect' => 'http://127.0.0.1:8000/callback/google',
    ], 

];
