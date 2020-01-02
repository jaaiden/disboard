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

// Basic Homepage Route
Route::get('/', function () { return view('home'); })->name('home');

// Discord Authentication Routes
Route::prefix('auth')->group(function ()
{
    Route::get('login', 'AuthController@redirectToDiscord')->name('login');
    Route::get('callback', 'AuthController@handleDiscordCallback');
    Route::get('logout', 'AuthController@handleLogout')->name('logout');
});