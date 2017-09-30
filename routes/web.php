<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/dashboard', 'UserController@home')->name('user.dashboard');
Route::get('/options', 'UserController@options')->name('user.options');



Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::resource('users', 'UserResourceController');
    Route::resource('schedules', 'ScheduleResourceController');
});
