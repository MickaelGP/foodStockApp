<?php

use App\Http\Controllers\Api\ProductApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('products', [ProductApiController::class, 'index']);
Route::post('/register', [ProductApiController::class, 'register']);
Route::post('/login', [ProductApiController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('products', [ProductApiController::class, 'store']);
    Route::patch('products/{productApi}', [ProductApiController::class, 'update']);
    Route::delete('products/{productApi}', [ProductApiController::class, 'destroy']);
    Route::post('/logout', [ProductApiController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
