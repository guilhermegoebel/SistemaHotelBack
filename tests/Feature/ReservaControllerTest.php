<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Reserva;

class ReservaControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_return_all_reservas()
    {
        // Crie algumas reservas de exemplo usando a factory
        Reserva::factory()->count(3)->create();

        // Faça a requisição GET
        $response = $this->get('/api/reservas');

        // Verifique se a resposta é válida
        $response->assertStatus(200);
        $response->assertJsonCount(3); // Verifica se retornou 3 reservas
    }
}
