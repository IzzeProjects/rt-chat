<?php


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SwooleTW\Http\Websocket\Facades\Websocket;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Token;

/*
|--------------------------------------------------------------------------
| Websocket Routes
|--------------------------------------------------------------------------
|
| Here is where you can register websocket events for your application.
|
*/

Websocket::on('connect', function ($websocket, Request $request) {
    /** @var Websocket $websocket */
    /** @var \Tymon\JWTAuth\JWT $tokenService */
    $token = new Token($request->token);
    $tokenService = JWTAuth::setToken($token);

    if (!$tokenService->check()) {
        $websocket->close($websocket->getSender());
        return;
    }
    $payload = $tokenService->manager()->decode($token);

    /** @var User $user */
    $user = User::find($payload['sub']);

    if(empty($user)) {
        $websocket->close($websocket->getSender());
        return;
    }

    $websocket->loginUsing($user);

    $websocket->join('test');

    echo 'Hello  ! ' . $user->name . ':)' . "\n";
});

Websocket::on('disconnect', function ($websocket) {
    /** @var \SwooleTW\Http\Websocket\Websocket $websocket */
    /** @var User $user */
    $user = auth()->user();
    echo $user->name ?? 1 . ' is left ! :(' . "\n";
});

Websocket::on('example', function ($websocket, $data) {
    /** @var \SwooleTW\Http\Websocket\Websocket $websocket */
    $websocket->broadcast()->to('test')->emit('message', $data);
});
