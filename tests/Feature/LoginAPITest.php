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
class LoginAPITest extends TestCase
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

    public function testUserCanLoginWithCorrectCredentials()
    {
        $password = '12345678';
        $email = 'pardio@gmail.com';

        $response = $this->postJson('/api/login', [
            'email' => $email,
            'password' => $password,
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'token'
        ]);
    }

    public function testUserCannotLoginWithIncorrectPassword()
    {
        $password = 'wrong';
        $email = 'pardio@gmail.com';

        $response = $this->postJson('/api/login', [
            'email' => $email,
            'password' => $password,
        ]);

        $response->assertStatus(401);
        $response->assertJson([
            'message' => 'Acceso denegado'
        ]);
    }

    public function testUserCannotLoginWithMissingFields()
    {
        $response = $this->postJson('/api/login', []);

        $response->assertStatus(401);
        $response->assertJson([
            'message' => 'Acceso denegado'
        ]);
    }
}