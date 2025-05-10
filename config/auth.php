<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'abogados',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'abogados',
        ],
        'api' => [
            'driver' => 'sanctum',
            'provider' => 'abogados',
        ],
    ],

    'providers' => [
        'abogados' => [
            'driver' => 'eloquent',
            'model' => App\Models\Abogado::class,
        ],
    ],

    'passwords' => [
        'abogados' => [
            'provider' => 'abogados',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
