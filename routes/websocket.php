<?php


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    /** @var \SwooleTW\Http\Websocket\Websocket $websocket */
    /** @var User $user */
    $user = $request->user();

    $websocket->loginUsing($request->user());

    $websocket->join('test');

    echo 'Hello  ! ' . $user->name . ':)'.  "\n";
});

Websocket::on('disconnect', function ($websocket) {
    /** @var \SwooleTW\Http\Websocket\Websocket $websocket */
    /** @var User $user */
    $user = auth()->user();
    echo  $user->name .' is left ! :(' . "\n";
});

Websocket::on('example', function ($websocket, $data) {
    /** @var \SwooleTW\Http\Websocket\Websocket $websocket */
    $websocket->broadcast()->to('test')->emit('message', $data);
});
