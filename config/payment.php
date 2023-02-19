<?php

return [
    "tahseeel" => [

        'Test' => [
            'uid' => env('TEST_UID'),
            'secret' => env('TEST_SECRET'),
            'pwd' => env('TEST_PWD'),
            'url' => env('TEST_URL'),
            'orderInfo' => env('TEST_ORDER_INFO'),
            'callback' => env('TEST_CALLBACK'),
        ],

        'live' => [
            'uid' => env('LIVE_UID'),
            'secret' => env('LIVE_SECRET'),
            'pwd' => env('LIVE_PWD'),
            'url' => env('LIVE_URL'),
            'orderInfo' => env('LIVE_ORDER_INFO'),
            'callback' => env('LIVE_CALLBACK'),
        ],

    ]
];
