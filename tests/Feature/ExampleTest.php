<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(302) // Espera una redirección
             ->assertRedirect('/login'); // Reemplaza '/ruta-esperada' con la ruta a la que se redirige
    }
}
