<?php
namespace Tests\Feature;

use Database\Seeders\AntenasTableSeeder;
use Database\Seeders\ModeloAntenaSeeder;
use Database\Seeders\ModeloRouterSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\RoutersTableSeeder;
use Database\Seeders\UserSeeder;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class UserAPITest extends TestCase
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
    /** @test */
    public function user_is_returned_when_authenticated()
    {
        // Retrieve the specific user
        $user = User::where('email', 'pardio@gmail.com')->firstOrFail();

        // Create a token for the user
        $token = $user->createToken('test-token')->plainTextToken;

        // Set the token in the header for the test request
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson('/api/user');

        // Perform the test
        $response->assertStatus(200)->assertJson(['user' => $user->toArray()]);
    }

    /** @test */
    public function error_is_returned_when_not_authenticated()
    {
        $response = $this->getJson('/api/user');

        $response->assertStatus(401);
    }
    /** @test */
    public function user_registration_with_valid_data()
    {
        $userData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'telefono' => '123456789',
            'direccion' => 'Calle Falsa 123'
        ];

        $response = $this->postJson('/api/registerUser', $userData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('users', ['email' => $userData['email']]);
    }

    /** @test */
    public function user_registration_with_invalid_data()
    {
        $response = $this->postJson('/api/registerUser', []);

        $response->assertStatus(400);
    }

    
}
