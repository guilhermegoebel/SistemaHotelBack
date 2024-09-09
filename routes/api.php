<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;

Route::post('/reserva', [ReservaController::class, 'salvar']);
Route::put('/reserva/{id}', [ReservaController::class, 'atualizar']);
Route::put('/reserva/checkin/{id}', [ReservaController::class, 'confirmCheckin']);
Route::put('/reserva/checkout/{id}', [ReservaController::class, 'confirmCheckout']);
Route::get('/reserva', [ReservaController::class, 'getAll']);
Route::get('/reserva/{id}', [ReservaController::class, 'getById']);
Route::delete('/reserva/{id}', [ReservaController::class, 'delete']);
