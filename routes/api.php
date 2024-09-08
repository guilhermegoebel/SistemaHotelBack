<?php

use App\Http\Controllers\ReservaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');;

Route::get('/reserva/checkin/{id}', [ReservaController::class, 'confirmCheckin']);
Route::get('/reserva/checkout/{id}', [ReservaController::class, 'confirmCheckout']);
