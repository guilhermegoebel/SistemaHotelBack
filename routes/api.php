<?php
use Illuminate\Support\Facades\Route;

Route::post('/api/reserva', [ReservaController::class, 'store']);
