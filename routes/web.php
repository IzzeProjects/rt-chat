<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'IndexController');

Auth::routes();



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
