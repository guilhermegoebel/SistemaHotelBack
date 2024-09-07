<?php
use Illuminate\Support\Facades\Route;
use App\http\Controllers\ReservaController;

Route::post('/api/reserva', [ReservaController::class, 'salvar']);
