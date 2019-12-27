<?php


use Illuminate\Http\Request;
use SwooleTW\Http\Websocket\Facades\Websocket;

/*
|--------------------------------------------------------------------------
| Websocket Routes
|--------------------------------------------------------------------------
|
| Here is where you can register websocket events for your application.
|
*/

Websocket::on('connect', function ($websocket, Request $request) {
   echo 'New Visitor ! :)' . "\n";
});

Websocket::on('disconnect', function ($websocket) {
    echo 'Visitor is left ! :(' . "\n";
});

Websocket::on('example', function ($websocket, $data) {
    $websocket->emit('message', $data);
});
