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
use Database\Seeders\ReportesTableSeeder;
class ReporteAPITest extends TestCase
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
        $this->seed(ReportesTableSeeder::class);
    }

    public function testGetReportesWithReportes()
    {
        $user = User::where('email', 'pardio@gmail.com')->firstOrFail();

        // Create a token for the user
        $token = $user->createToken('test-token')->plainTextToken;

        // Set the token in the header for the test request
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson('/api/reportes');

        // Assert response
        $response->assertStatus(200);
    }


    public function testAgregarReporteSuccessfully()
    {
        $user = User::where('email', 'pardio@gmail.com')->firstOrFail();

        // Create a token for the user
        $token = $user->createToken('test-token')->plainTextToken;

        // Set the token in the header for the test request
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/agregarReporte', [
            'asunto' => 'Test Asunto',
            'descripcion' => 'Test Descripcion'
        ]);

        // Assert response
        $response->assertStatus(200)->assertJson(['message' => 'Reporte creado correctamente']);
    }

    public function testAgregarReporteFails()
    {
        $user = User::where('email', 'pardio@gmail.com')->firstOrFail();

        // Create a token for the user
        $token = $user->createToken('test-token')->plainTextToken;

        // Set the token in the header for the test request
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/agregarReporte', []);

        // Assert response
        $response->assertStatus(400)
                 ->assertJson(['message' => 'Datos invalidos']);
    }
}

