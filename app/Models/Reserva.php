<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reserva extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id_reserva';
    protected $table = 'reserva';
    protected $connection = 'mysql';
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'cpf',
        'data_checkin',
        'data_checkout',
        'checkin_confirmado',
        'checkout_confirmado',
        'numero_criancas',
        'numero_adultos',
        'numero_quartos',
    ];
}
