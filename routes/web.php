<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
<<<<<<< HEAD
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
=======
use App\Http\Controllers\RoleUserController;
>>>>>>> 3fa4912e87444867660c3f085f95c33f01634697

Route::get('/', function () {
    return redirect(route('login'));
    // return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    //Dashboard Route
    Route::get('/home', [UserController::class, 'dashboard'])->name('home');

    //Profile Route
    Route::get('/setting',[ProfileController::class, 'setting'])->name('setting');
    Route::get('/profile',[ProfileController::class, 'profile'])->name('profile');
    Route::put('/profile/update', [ProfileController::class, 'profile_update'])->name('profile.update');
    Route::put('/profile/password/{id}', [ProfileController::class, 'profile_password_update'])->name('profile.password.update');

<<<<<<< HEAD
     //Role Route
     Route::resource('role', RolesController::class);
     //User Route
     Route::resource('user', UserController::class);
=======
    //User Route
    Route::resource('user', RoleUserController::class );
>>>>>>> 3fa4912e87444867660c3f085f95c33f01634697
});
