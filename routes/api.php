<?php

use App\Http\Controllers\ReservaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/reservas', [ReservaController::class, 'getAll']);

Route::get('/reservas/{id}', [ReservaController::class, 'getById']);

Route::delete('/reservas/{id}', [ReservaController::class, 'delete']);
