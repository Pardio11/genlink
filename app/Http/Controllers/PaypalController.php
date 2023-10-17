<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Pago;
use Srmklive\PayPal\Facades\PayPal;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends PagoController
{

    public function payment(Request $request)
    {
        $pago = Pago::find($request->pagoId);
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
                "return_url" => route('paypal_success', $request->pagoId),
                "cancel_url" => route('paypal_cancel')
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
                return redirect()->route('paypal_cancel');
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
            return redirect()->route('mis-pagos');
            
            //return redirect()->route('realizarPago',['clienteId' => $clienteId]);

        } else{
            return redirect()->route('paypal_cancel');
        }
    }
    public function cancel()
    {
        return "PAGO CANCELADO";
    }
}
