<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('get-v', 'App\Http\Controllers\InputController@show');
Route::get('showv', 'App\Http\Controllers\InputController@showv');