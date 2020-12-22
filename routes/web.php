<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/', 'app.home')->name('app.home');

Route::view('/user', 'app.user')->middleware('auth')->name('app.user');

Route::prefix('/docs')->group(function ()
{
    Route::view('/', 'docs.home')->name('docs.home');
    Route::get('{category}/{page}', function($category, $page)
    {
        return view("docs.$category.$page") ?? abort(404);
    });
});