<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;

class CajaController extends PagoController
{
    public function reportarPagos(Request $request)
    {
        $pago=$request->pagoId;
        $pago = Pago::find($request->pagoId);
        $this->realizarPago($pago->id);
        return redirect()->route('busquedaCliente');
    }
}
