<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use Illuminate\Http\Request;


class ReservaController extends Controller
{

    public function confirmCheckin ($id){
        $reserva = Reserva::find($id);

        if(!$reserva) {
            return response()->json(['message' => 'ERRO: Reserva não encontrada'], 404);
        } else {
            if($reserva->checkin_confirmado) {
                return response()->json(['message' => 'Este checkin já foi confirmado.']);
            } else {
                $reserva->checkin_confirmado = true;
                $reserva->save();
                return response()->json(['message' => 'Checkin confirmado.'], 200);
            }
        }
    }

    public function confirmCheckout ($id){
        $reserva = Reserva::find($id);

        if(!$reserva) {
            return response()->json(['message' => 'ERRO: Reserva não encontrada'], 404);
        } else {
            if ($reserva->checkin_confirmado) {
                if ($reserva->checkout_confirmado) {
                    return response()->json(['message' => 'Este checkout já foi confirmado.']);
                }else {
                    $reserva->checkout_confirmado = true;
                    $reserva->save();
                    return response()->json(['message' => 'Checkout confirmado.'], 200);
                }
            } else {
                return response()->json(['message' => 'ERRO: Não houve confirmação de checkin.', 400]);
            }
        }
    }

    /*
    public function getById($id){
        return Reserva::find($id);
    }
    */
}
