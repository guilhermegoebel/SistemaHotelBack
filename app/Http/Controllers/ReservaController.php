<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;

class ReservaController extends Controller
{
    public function salvar(Request $request) {
        $validatedData = $request->validate ([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'telefone' => 'required|string|max:20',
            'cpf' => 'required|string|max:14', // precisa de validacao de cpf/cnpj
            'data_checkin' => 'required|date',
            'data_checkout' => 'required|date|after_or_equal:data_checkin',
            'checkin_confirmado' => 'nullable|boolean',
            'checkout_confirmado' => 'nullable|boolean',
            'numero_criancas' => 'required|integer|min:0',
            'numero_adultos' => 'required|integer|min:1',
            'numero_quartos' => 'required|integer|min:1',
        ]);

        $reserva = Reserva::create($validatedData);

        return response()->json([
           'success' => true,
            'message' => 'Reserva criada com sucesso',
            'data' => $reserva,
        ]);
    }
}
