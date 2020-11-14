<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteSettingsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect(route('login'));
    // return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    //Dashboard Route
    Route::get('/home', [UserController::class, 'dashboard'])->name('home');

    //Profile Route
    Route::get('/profile/settings',[ProfileController::class, 'setting'])->name('setting');
    Route::get('/profile',[ProfileController::class, 'profile'])->name('profile');
    Route::put('/profile/update', [ProfileController::class, 'profile_update'])->name('profile.update');
    Route::put('/profile/password/{id}', [ProfileController::class, 'profile_password_update'])->name('profile.password.update');

    //Roles Route
    Route::resource('role', RolesController::class);

    //Users Route
    Route::resource('user', UserController::class);

    //  Website Settings
    Route::resource('website/settings', WebsiteSettingsController::class,['names' => 'website.setting']);

});
