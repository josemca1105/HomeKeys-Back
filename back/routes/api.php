<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);
Route::get('/users/{id}', [App\Http\Controllers\UserController::class, 'show']);
Route::post('/users-create', [App\Http\Controllers\UserController::class, 'store']);
Route::post('/users-update/{id}', [App\Http\Controllers\UserController::class, 'update']);
Route::delete('/users-delete/{id}', [App\Http\Controllers\UserController::class, 'destroy']);
Route::get('imagen/{id}', [App\Http\Controllers\UserController::class, 'getImage']);
