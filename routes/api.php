<?php

use Illuminate\Http\Request;

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


Route::namespace('API')->group(function () {
    // Controllers Within The "App\Http\Controllers\API" Namespace
    Route::get('/schedule', 'ScheduleController@day');
    Route::get('/schedule/week', 'ScheduleController@week');

    Route::get('/schedules', 'ScheduleController@index');
    Route::get('/schedules/{id}', 'ScheduleController@show');
});

