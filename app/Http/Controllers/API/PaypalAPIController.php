<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pago;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
class PaypalAPIController extends Controller
{
    public function payment(Request $request)
    {
        $pago = Pago::find($request->pagoId);
        if($pago){
            $price = 0;
            if($pago->tipoServicio)
                $price+=$pago->tipoServicio->costo;
            if($pago->recargo)
                $price+=$pago->recargo->monto;  

            /* dd($request->price); */
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken=$provider->getAccessToken();
            
            $response=$provider->createOrder([
    
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('successAPI', $request->pagoId),
                    "cancel_url" => route('cancelAPI')
                ],
                "purchase_units"=> 
                    [
                        [
                        "amount"=> [
                            "currency_code" => "USD",
                            "value" => $price
                            ]
                        ]
                    ]            
                ]);   
                
                
                if(isset($response['id']) && $response['id']!=null){
                    foreach($response['links'] as $link){
                        if($link['rel'] === 'approve'){
                            return redirect()-> away($link['href']);
                        }
                    }
                }else{
                    return redirect()->route('cancelAPI');
                } 
            }else{
                return response()->json([
                    'message' => 'missing id'
                ], 400);
            }
    }
    public function success(Request $request, $pagoId)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken=$provider->getAccessToken();  
        $response = $provider->capturePaymentOrder($request->token);


        if(isset($response['status']) && $response['status']== 'COMPLETED'){
            $this->realizarPago($pagoId);
            return response()->json([
                'message' => 'pago exitoso'
            ], 200);
            
            //return redirect()->route('realizarPago',['clienteId' => $clienteId]);

        } else{
            return redirect()->route('cancelAPI');
        }
    }
    public function cancel()
    {
        return response()->json([
            'message' => 'pago cancelado'
        ], 400);
    }
}
