<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;

Route::get('/reservas', [ReservaController::class, 'getAll']);

Route::get('/reservas/{id}', [ReservaController::class, 'getById']);
