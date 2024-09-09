<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('reserva', function (Blueprint $table) {
            $table->id('id_reserva');
            $table->string('nome');
            $table->string('email');
            $table->string('telefone');
            $table->string('cpf');
            $table->date('data_checkin')->nullable();
            $table->date('data_checkout')->nullable();
            $table->boolean('checkin_confirmado')->default(false);
            $table->boolean('checkout_confirmado')->default(false);
            $table->smallInteger('numero_criancas');
            $table->smallInteger('numero_adultos');
            $table->smallInteger('numero_quartos');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reserva');
    }
};
