<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rutas Usuarios
Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);
Route::get('/users/{id}', [App\Http\Controllers\UserController::class, 'show']);
Route::post('/users-create', [App\Http\Controllers\UserController::class, 'store']);
Route::post('/users-update/{id}', [App\Http\Controllers\UserController::class, 'update']);
Route::delete('/users-delete/{id}', [App\Http\Controllers\UserController::class, 'destroy']);

// Obtener imagen de usuario
Route::get('imagen/{id}', [App\Http\Controllers\UserController::class, 'getImage']);

// Rutas Casas
Route::get('/casas', [App\Http\Controllers\CasaController::class, 'index']);
Route::get('/casas/{id}', [App\Http\Controllers\CasaController::class, 'show']);
Route::post('/casas-create', [App\Http\Controllers\CasaController::class, 'store']);
Route::post('/casas-update/{id}', [App\Http\Controllers\CasaController::class, 'update']);
Route::delete('/casas-delete/{id}', [App\Http\Controllers\CasaController::class, 'destroy']);

// Rutas Apartamentos
Route::get('/apartamentos', [App\Http\Controllers\ApartamentoController::class, 'index']);
Route::get('/apartamentos/{id}', [App\Http\Controllers\ApartamentoController::class, 'show']);
Route::post('/apartamentos-create', [App\Http\Controllers\ApartamentoController::class, 'store']);
Route::post('/apartamentos-update/{id}', [App\Http\Controllers\ApartamentoController::class, 'update']);
Route::delete('/apartamentos-delete/{id}', [App\Http\Controllers\ApartamentoController::class, 'destroy']);
