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

    public function getById($id)
    {
        // Tenta encontrar a reserva com o ID
        $reserva = Reserva::find($id);

        // Verifica se a reserva foi encontrada
        if ($reserva) {
            return response()->json($reserva, 200);
        } else {
            return response()->json(['message' => 'Reserva não encontrada'], 404);
        }
    }

    public function delete($id)
    {
        // Tenta encontrar a reserva com o ID
        $reserva = Reserva::find($id);

        // Verifica se a reserva foi encontrada
        if (!$reserva) {
            return response()->json(['message' => 'Reserva não encontrada'], 404);
        }

        // Exclusao logica
        $reserva->delete();

        return response()->json(['message' => 'Reserva excluída com sucesso'], 200);
    }
}
