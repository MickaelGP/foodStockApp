<?php

use App\Http\Controllers\Auth\AuthController;
use \App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->prefix('/')->group(function () {
    Route::get('/', 'index')->name('welcome');
    Route::get('register', 'register')->name('register');
    Route::get('login', 'login')->name('login');
});
Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
    route::get('/logout', 'logout')->name('logout');
    Route::post('/register', 'register')->name('register');
});
Route::controller(ProfileController::class)->prefix('/profile')->group(function () {
    route::get('/', 'index')->name('dashboard')->middleware('auth');
    route::get('/{user}/edit', 'editProfile')->name('edit.profile')->middleware('auth');

});
