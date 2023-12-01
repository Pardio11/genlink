<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Contrato;
use Database\Seeders\AntenasTableSeeder;
use Database\Seeders\ModeloAntenaSeeder;
use Database\Seeders\ModeloRouterSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\RoutersTableSeeder;
use Database\Seeders\UserSeeder;

class ContratoAPITest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        // Run a specific seeder
        $this->seed(RoleSeeder::class);
        $this->seed(ModeloAntenaSeeder::class);
        $this->seed(ModeloRouterSeeder::class);
        $this->seed(RoutersTableSeeder::class);
        $this->seed(AntenasTableSeeder::class);
        $this->seed(UserSeeder::class);
    }
    public function testUserWithContrato()
    {
         // Retrieve the specific user
         $user = User::where('email', 'pardio@gmail.com')->firstOrFail();

         // Create a token for the user
         $token = $user->createToken('test-token')->plainTextToken;
 
         // Set the token in the header for the test request
         $response = $this->withHeaders([
             'Authorization' => 'Bearer ' . $token,
         ])->getJson('/api/contrato');


        $response->assertStatus(200)
                 ->assertJson([
                     'contrato' => $user->cliente->contrato->toArray()
                 ]);
    }

    public function testUserWithoutContrato()
    {
        // Retrieve the specific user
        $user = User::where('email', 'amaro@gmail.com')->firstOrFail();

        // Create a token for the user
        $token = $user->createToken('test-token')->plainTextToken;

        // Set the token in the header for the test request
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson('/api/contrato');

        $response->assertStatus(200)
                 ->assertJson(['contrato' => null]);
    }
}