<?php

namespace Database\Factories;

use App\Models\Reserva;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservaFactory extends Factory
{
    protected $model = Reserva::class;

    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'telefone' => $this->faker->phoneNumber,
            'cpf' => $this->faker->numerify('###.###.###-##'), // Gera um CPF fictício
            'data_checkin' => $this->faker->date,
            'data_checkout' => $this->faker->date,
            'checkin_confirmado' => false,
            'checkout_confirmado' => false,
            'numero_criancas' => $this->faker->numberBetween(0, 5),
            'numero_adultos' => $this->faker->numberBetween(1, 5),
            'numero_quartos' => $this->faker->numberBetween(1, 5),
        ];
    }
}
