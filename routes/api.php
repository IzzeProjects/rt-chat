<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::options('/{any}')->where('any', '.*');

Route::prefix('auth')
    ->namespace('Api\Auth')
    ->group(function () {
        Route::post('login', 'LoginController');
    });

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/test/test', function (Request $request) {
    return 'test route';
});
