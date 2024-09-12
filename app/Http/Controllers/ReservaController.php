<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function salvar(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'telefone' => 'required|string|max:255',
            'cpf' => 'required|string|max:255', // precisa de validacao de cpf/cnpj
            'data_checkin' => 'required|date',
            'data_checkout' => 'required|date|after_or_equal:data_checkin',
            'checkin_confirmado' => 'nullable|boolean',
            'checkout_confirmado' => 'nullable|boolean',
            'numero_criancas' => 'required|integer|min:0',
            'numero_adultos' => 'required|integer|min:1',
            'numero_quartos' => 'required|integer|min:1',
            'detalhesRelevantes' => 'nullable',
        ]);

        $validatedData['checkin_confirmado'] = $validatedData['checkin_confirmado'] ?? false;
        $validatedData['checkout_confirmado'] = $validatedData['checkout_confirmado'] ?? false;

        $reserva = Reserva::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Reserva criada com sucesso',
            'data' => $reserva,
        ]);
    }

    public function atualizar(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nome' => 'string|max:255',
            'email' => 'string|email|max:255',
            'telefone' => 'string|max:25',
            'cpf' => 'string|max:25', // precisa de validacao de cpf/cnpj
            'data_checkin' => 'date',
            'data_checkout' => 'date|after_or_equal:data_checkin',
            'checkin_confirmado' => 'nullable|boolean',
            'checkout_confirmado' => 'nullable|boolean',
            'numero_criancas' => 'integer|min:0',
            'numero_adultos' => 'integer|min:1',
            'numero_quartos' => 'integer|min:1',
        ]);

        $reserva = Reserva::find($id);

        if (!$reserva) {
            return response()->json([
                'success' => false,
                'message' => 'Reserva não encontrada',
            ], 404);
        }

        $reserva->update($validatedData);
        $reserva = Reserva::find($id);
        return response()->json([
            'success' => true,
            'message' => 'Reserva atualizada com sucesso',
            'data' => $reserva,
        ]);
    }

    public function confirmCheckin($id)
    {
        $reserva = Reserva::find($id);

        if (!$reserva) {
            return response()->json(['message' => 'ERRO: Reserva não encontrada'], 404);
        } else {
            if ($reserva->checkin_confirmado) {
                return response()->json(['message' => 'Este checkin já foi confirmado.']);
            } else {
                $reserva->checkin_confirmado = true;
                $reserva->save();
                return response()->json(['message' => 'Checkin confirmado.'], 200);
            }
        }
    }

    public function confirmCheckout($id)
    {
        $reserva = Reserva::find($id);

        if (!$reserva) {
            return response()->json(['message' => 'ERRO: Reserva não encontrada'], 404);
        } else {
            if ($reserva->checkin_confirmado) {
                if ($reserva->checkout_confirmado) {
                    return response()->json(['message' => 'Este checkout já foi confirmado.']);
                } else {
                    $reserva->checkout_confirmado = true;
                    $reserva->save();
                    return response()->json(['message' => 'Checkout confirmado.'], 200);
                }
            } else {
                return response()->json(['message' => 'ERRO: Não houve confirmação de checkin.', 400]);
            }
        }
    }

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
