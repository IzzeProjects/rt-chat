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

/**
 * Роут для отдачи CORS заголовков метода OPTIONS
 */
Route::options('/{any}')->where('any', '.*');

Route::prefix('auth')
    ->namespace('Auth')
    ->name('auth.')
    ->group(function () {
        Route::post('login', 'LoginController')->name('login');
    });

Route::middleware('auth:api')->group(function () {
    Route::prefix('rooms')
        ->namespace('Room')
        ->name('room.')
        ->group(function () {
            Route::post('', 'CreateController')->name('create');
        });
    Route::prefix('users')
        ->namespace('User')
        ->name('user.')
        ->group(function () {
            Route::get('rooms/created', 'CreatedRoomsController')->name('rooms.created');
            Route::get('', 'UsersController')->name('show.all');
        });
});


