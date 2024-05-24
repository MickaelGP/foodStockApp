<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
  //  return $request->user();
//})->middleware('auth:sanctum');

Route::get('products', [\App\Http\Controllers\ProductApiController::class, 'index']);
Route::post('products', [\App\Http\Controllers\ProductApiController::class, 'store']);
Route::patch('products/{productApi}', [\App\Http\Controllers\ProductApiController::class, 'update']);
Route::delete('products/{productApi}', [\App\Http\Controllers\ProductApiController::class, 'destroy']);
