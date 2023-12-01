<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Recargo;
use App\Models\User;
use Database\Seeders\AntenasTableSeeder;
use Database\Seeders\ModeloAntenaSeeder;
use Database\Seeders\ModeloRouterSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\RoutersTableSeeder;
use Database\Seeders\UserSeeder;

class RecargoAPITest extends TestCase
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

    public function testGetRecargoWithExistingId()
    {
        // Create a Recargo instance
        $recargo = Recargo::factory()->create();
        // Retrieve the specific user
        $user = User::where('email', 'esteban@gmail.com')->firstOrFail();

        // Create a token for the user
        $token = $user->createToken('test-token')->plainTextToken;

        // Set the token in the header for the test request
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson('/api/recargo/' . $recargo->id);


        $response->assertStatus(200)
                 ->assertJson([
                     'recargo' => $recargo->toArray()
                 ]);
    }

    public function testGetRecargoWithNonExistingId()
    {
        // Use a non-existing id
        $nonExistingId = 99999; 
        $user = User::where('email', 'esteban@gmail.com')->firstOrFail();

        // Create a token for the user
        $token = $user->createToken('test-token')->plainTextToken;

        // Set the token in the header for the test request
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson('/api/recargo/' . $nonExistingId);
        
        $response->assertStatus(400)
                 ->assertJson(['message' => 'Recargo Inexistente']);
    }
}
