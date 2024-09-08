<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;

Route::get('/user', function (Request $request) {
    return $request->user();
}); //->middleware('auth:sanctum');

Route::post('/reserva', [ReservaController::class, 'salvar']);
Route::put('/reserva/{id}', [ReservaController::class, 'atualizar']);

Route::post('/test', function (Request $request) {
    return response()->json(['message' => 'POST request successful']);
});
