<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Database\Seeders\AntenasTableSeeder;
use Database\Seeders\ModeloAntenaSeeder;
use Database\Seeders\ModeloRouterSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\RoutersTableSeeder;
use Database\Seeders\UserSeeder;
class InstalacionAPITest extends TestCase
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

    public function testAsignarInstalacion()
    {
         // Retrieve the specific user
         $user = User::where('email', 'esteban@gmail.com')->firstOrFail();

         // Create a token for the user
         $token = $user->createToken('test-token')->plainTextToken;
 
         // Set the token in the header for the test request
         $response = $this->withHeaders([
             'Authorization' => 'Bearer ' . $token,
         ])->getJson('/api/asignarInstalacion');

        $response->assertStatus(200)
                 ->assertJson(['message' => "Se asigno la instalacion correctamente"]);
    }

    public function testGetInstalacion()
    {
        // Retrieve the specific user
        $user = User::where('email', 'pardio@gmail.com')->firstOrFail();

        // Create a token for the user
        $token = $user->createToken('test-token')->plainTextToken;

        // Set the token in the header for the test request
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson('/api/instalacion');

        // Verificar la recuperación exitosa de la información de la instalación
        $response->assertStatus(200)
                 ->assertJson(['instalacion' => $user->cliente->instalacion->toArray()]);
    }
}
