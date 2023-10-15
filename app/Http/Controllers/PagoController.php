<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class Pago extends Controller
{
    public function generarPago($clienteId)
    {
        $cliente = Cliente::find($clienteId);
        if($cliente->pagos){
            dd("SI tiene pagos");
        }else{
            dd("NO tiene pagos");
        }

    }
}
