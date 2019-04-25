<?php

return [
    'user' => [
        'model' => 'App\User',
    ],
    'broadcast' => [
        'enable' => true,
        'app_name' => 'new app',
        'pusher' => [
            'app_id' => '769101',
            'app_key' => 'd157f568b4f9c97f9fb5',
            'app_secret' => 'b5ae44c036c2827a52e5',
            'options' => [
                'cluster' => 'ap2',
                'encrypted' => true
            ]
        ],
    ],
];
