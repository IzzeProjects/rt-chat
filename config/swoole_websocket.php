<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Websocket handler for onOpen and onClose callback
    | Replace this handler if you want to customize your websocket handler
    |--------------------------------------------------------------------------
    */
    'handler' => SwooleTW\Http\Websocket\SocketIO\WebsocketHandler::class,

    /*
    |--------------------------------------------------------------------------
    | Default frame parser
    | Replace it if you want to customize your websocket payload
    |--------------------------------------------------------------------------
    */
    'parser' => SwooleTW\Http\Websocket\SocketIO\SocketIOParser::class,

    /*
    |--------------------------------------------------------------------------
    | Websocket route file path
    |--------------------------------------------------------------------------
    */
    'route_file' => base_path('routes/websocket.php'),

    /*
    |------------------------------------------message--------------------------------
    | Default middleware for on connect request
    |--------------------------------------------------------------------------
    */
    'middleware' => [
//        \App\Http\Middleware\SetUserForWebSocket::class,
        SwooleTW\Http\Websocket\Middleware\DecryptCookies::class,
        \App\Http\Middleware\TestSession::class,
        SwooleTW\Http\Websocket\Middleware\Authenticate::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Websocket handler for customized onHandShake callback
    |--------------------------------------------------------------------------
    */
    'handshake' => [
        'enabled' => false,
        'handler' => SwooleTW\Http\Websocket\HandShakeHandler::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Default websocket driver
    |--------------------------------------------------------------------------
    */
    'default' => 'table',

    /*
    |--------------------------------------------------------------------------
    | Websocket client's heartbeat interval (ms)
    |--------------------------------------------------------------------------
    */
    'ping_interval' => 25000,

    /*
    |--------------------------------------------------------------------------
    | Websocket client's heartbeat interval timeout (ms)
    |--------------------------------------------------------------------------
    */
    'ping_timeout' => 60000,

    /*
    |--------------------------------------------------------------------------
    | Room drivers mapping
    |--------------------------------------------------------------------------
    */
    'drivers' => [
        'table' => SwooleTW\Http\Websocket\Rooms\TableRoom::class,
        'redis' => SwooleTW\Http\Websocket\Rooms\RedisRoom::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Room drivers settings
    |--------------------------------------------------------------------------
    */
    'settings' => [

        'table' => [
            'room_rows' => 4096,
            'room_size' => 2048,
            'client_rows' => 8192,
            'client_size' => 2048,
        ],

        'redis' => [
            'server' => [
                'host' => env('REDIS_HOST', 'redis'),
                'password' => env('REDIS_PASSWORD', null),
                'port' => env('REDIS_PORT', 6379),
                'database' => 0,
                'persistent' => true,
            ],
            'options' => [
                //
            ],
            'prefix' => 'swoole:',
        ],
    ],
];
