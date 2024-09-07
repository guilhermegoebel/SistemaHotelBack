<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;

Route::post('/reserva', [ReservaController::class, 'salvar']);
