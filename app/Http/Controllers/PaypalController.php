<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Srmklive\PayPal\Facades\PayPal;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{
    public $clienteId;
    public function payment(Request $request)
    {
        /* dd($request->price); */
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken=$provider->getAccessToken();

        $response=$provider->createOrder([
 
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal_success'),
                "cancel_url" => route('paypal_cancel')
            ],
            "purchase_units"=> 
                [
                    [
                    "amount"=> [
                        "currency_code" => "USD",
                        "value" => $request->price
                        ]
                    ]
                ]            
            ]);   
            /* dd($response);    */
            
            if(isset($response['id']) && $response['id']!=null){
                foreach($response['links'] as $link){
                    if($link['rel'] === 'approve'){
                        return redirect()-> away($link['href']);
                    }
                }
            }else{
                return redirect()->route('paypal_calcel');
            } 
    }
    public function success(Request $request, $clienteId)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken=$provider->getAccessToken();  
        $response = $provider->capturePaymentOrder($request->token);

        /* dd($response); */

        if(isset($response['status']) && $response['status']== 'COMPLETED'){
            $cliente = Cliente::find($clienteId);
            $pagos=$cliente->pagos->where('fecha_pagado', null);
            return redirect()->route('mis-pagos');

        } else{
            return redirect()->route('paypal_cancel');
        }
    }
    public function cancel()
    {
        return "PAGO CANCELADO";
    }
}
