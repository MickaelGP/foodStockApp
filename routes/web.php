<?php

use App\Http\Controllers\Auth\AuthController;
use \App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Stock\StockController;
use App\Models\Stock;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->prefix('/')->group(function () {
    Route::get('/', 'index')->name('welcome');
    Route::get('register', 'register')->name('register');
    Route::get('login', 'login')->name('login');
    Route::post('/contact', 'contactMail')->name('contactMail');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout')->middleware('auth');
    Route::post('/register', 'register')->name('register');
});

Route::middleware(['auth'])->group(function () {

    Route::controller(ProfileController::class)->prefix('/dashboard')->group(function () {
        Route::get('/', 'index')->name('dashboard');
        Route::get('/stat', 'statistic')->name('stat');
        Route::get('/profile/{user}/edit', 'editProfile')->name('edit.profile');
        Route::patch('/profile/{user}/update-password', 'updatePassword')->name('update.password');
        Route::patch('/profile/{user}/update-profile', 'updateProfile')->name('update.profile');
        Route::delete('/profile/{user}/delete-profile', 'destroy')->name('delete.profile');
    });

    Route::controller(StockController::class)->prefix('/stock')->group(function () {
        Route::get('/', 'index')->name('stock.index');
        Route::post('/', 'store')->name('stock.store');
        Route::get('search', 'search')->name('stock.search');
        Route::get('/{stock}/edit', 'edit')->name('stock.edit');
        Route::patch('/{stock}/update', 'update')->name('stock.update');
        Route::delete('/{stock}/delete', 'destroy')->name('stock.delete');
    });
});
