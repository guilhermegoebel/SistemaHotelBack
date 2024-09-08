<?php

use App\Http\Controllers\ReservaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');;

Route::put('/reserva/checkin/{id}', [ReservaController::class, 'confirmCheckin']);
Route::put('/reserva/checkout/{id}', [ReservaController::class, 'confirmCheckout']);

//Route::get('reserva/{id}', [ReservaController::class, 'getById']); //usando para teste

