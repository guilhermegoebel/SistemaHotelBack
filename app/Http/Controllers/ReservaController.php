<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function getAll()
    {
        // Pega todas as reservas do banco de dados
        $reservas = Reserva::all();

        // Retorna a resposta em um JSON
        return response()->json($reservas);
    }
}
