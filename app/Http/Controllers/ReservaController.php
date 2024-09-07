<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function getAll()
    {
        return Reserva::all();
    }
}
