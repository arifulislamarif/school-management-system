<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    //Home Route
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //Profile Route
    Route::get('/setting',[ProfileController::class, 'setting'])->name('setting');
    Route::get('/profile',[ProfileController::class, 'profile'])->name('profile');
    Route::put('/profile/update', [ProfileController::class, 'profile_update'])->name('profile.update');
    Route::put('/profile/password/{id}', [ProfileController::class, 'profile_password_update'])->name('profile.password.update');
});
