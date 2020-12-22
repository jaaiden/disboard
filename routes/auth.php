<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'redirectToDiscord'])->name('auth.login');
Route::get('/callback', [AuthController::class, 'handleDiscordCallback']);
Route::get('/logout', [AuthController::class, 'handleLogout'])->name('auth.logout');