<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class PagoController extends Controller
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
    public function realizarPago($clienteId)
    {
        $cliente = Cliente::find($clienteId);
        $pagos=$cliente->pagos->where('fecha_pagado', null);
        $pagosFiltrados = $pagos->filter(function ($pago) {
            $fechaLimite = \Carbon\Carbon::parse($pago->fecha_limite);
            $fechaActual = now();
            return $fechaActual->format('m-Y') <= $fechaLimite->format('m-Y');
        });
        foreach ($pagosFiltrados as $pago) {
            $pago->fecha_pagado = now();
            $pago->save();
        }
        return redirect()->back()->with('success', 'Instalación creada y asignada exitosamente.');
    }
}
