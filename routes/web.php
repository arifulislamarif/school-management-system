<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/setting', [HomeController::class, 'setting'])->name('setting');

    //Profile Route
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [HomeController::class, 'profile_edit'])->name('profile.edit');

    // /User Route
    Route::get('/users', [HomeController::class, 'users'])->name('users');
    Route::get('/messages', [HomeController::class, 'messages'])->name('messages');
});
