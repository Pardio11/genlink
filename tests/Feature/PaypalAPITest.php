<?php

namespace Tests\Feature;

use Database\Seeders\CajaTableSeeder;
use Database\Seeders\PagosTableSeeder;
use Database\Seeders\RecargosTableSeeder;
use Database\Seeders\TipoServiciosTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Pago;
use App\Models\User;

use Database\Seeders\AntenasTableSeeder;
use Database\Seeders\ModeloAntenaSeeder;
use Database\Seeders\ModeloRouterSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\RoutersTableSeeder;
use Database\Seeders\UserSeeder;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalAPITest extends TestCase
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
        $this->seed(TipoServiciosTableSeeder::class);
        $this->seed(RecargosTableSeeder::class);
        $this->seed(CajaTableSeeder::class);
        $this->seed(PagosTableSeeder::class);
    }
    public function testPaymentWithValidPagoId()
    {
        // Retrieve the specific user
        $user = User::where('email', 'pardio@gmail.com')->firstOrFail();

        // Create a token for the user
        $token = $user->createToken('test-token')->plainTextToken;

        

        // Mock the PayPalClient
        $this->mock(PayPalClient::class, function ($mock) {
            $mock->shouldReceive('setApiCredentials')->once();
            $mock->shouldReceive('getAccessToken')->once();
            $mock->shouldReceive('createOrder')->andReturn([
                'id' => 'test_order_id',
                'links' => [
                    [
                        'rel' => 'approve',
                        'href' => 'test_approval_link'
                    ]
                ]
            ]);
        });

        // Create a Pago instance
        $pago = $user->cliente->pagos->last();

        // Make the request
        // Set the token in the header for the test request
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/paypal/paymentAPI', ['pagoId' => $pago->id]);

         // Assert that the response is a redirect
    $response->assertStatus(302); // or 303, depending on your implementation

    // Assert the URL structure
    $actualUrl = $response->headers->get('Location');
    $this->assertStringStartsWith('https://www.sandbox.paypal.com/checkoutnow', $actualUrl);
        
    }

    public function testSuccessPayment()
    {
        // Retrieve the specific user
        $user = User::where('email', 'pardio@gmail.com')->firstOrFail();

        // Create a token for the user
        $token = $user->createToken('test-token')->plainTextToken;



        // Mock the PayPalClient
        $this->mock(PayPalClient::class, function ($mock) {
            $mock->shouldReceive('setApiCredentials')->once();
            $mock->shouldReceive('getAccessToken')->once();
            $mock->shouldReceive('capturePaymentOrder')->andReturn([
                'status' => 'COMPLETED'
            ]);
        });

        // Create a Pago instance
        $pagoId = Pago::factory()->create()->id;

        // Make the request
        // Set the token in the header for the test request
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson('/api/success/{$pagoId}?token=test_token');

        // Assert successful response
        $response->assertStatus(200)->assertJson(['message' => 'pago exitoso']);
    }

    public function testCancelPayment()
    {
        // Retrieve the specific user
        $user = User::where('email', 'pardio@gmail.com')->firstOrFail();

        // Create a token for the user
        $token = $user->createToken('test-token')->plainTextToken;

        // Set the token in the header for the test request
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson('/api/cancel');

        $response->assertStatus(400)->assertJson(['message' => 'pago cancelado']);
    }
}
