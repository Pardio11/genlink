<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pago;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CajaController extends PagoController
{
    public function reportarPagos(Request $request)
    {
        $pago=$request->pagoId;
        $pago = Pago::find($request->pagoId);
        $pago->caja_id=$request->caja_id;
        $pago->save();
        $this->realizarPago($pago->id);
        
        return redirect()->route('busquedaCliente');
    }
    public function adelantarPagos(Request $request)
    {
        $caja_id= $request->caja_id;
        $numeroCliente = $request->numeroCliente;
        $adelanto = $request->adelanto;

        for($i= 0; $i < $adelanto; $i++){

            $cliente = Cliente::where('n_id', $numeroCliente)->first();
            $pagos = $cliente->pagos;
            $pago = $pagos->last();
            $pago->caja_id = $caja_id;
            $pago->save();
            $this->realizarPago($pago->id, false);
        }
        return redirect()->route('busquedaCliente');
    }
}
