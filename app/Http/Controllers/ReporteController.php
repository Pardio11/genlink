<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Reporte;
use Illuminate\Http\Request;

class ReporteController extends Controller
{

    public function resolverReporte($reporteId)
    {

        $reporte = Reporte::find($reporteId);
        $reporte->resuelto=true;
        $reporte->save();

        return redirect()->back()->with('success', 'Reporte Resuelto');

       /*  $pagos=$cliente->pagos->where('fecha_pagado', null);
        $pagosFiltrados = $pagos->filter(function ($pago) {
            $fechaLimite = \Carbon\Carbon::parse($pago->fecha_limite);
            $fechaActual = now();
            return $fechaActual->format('Y-m') <= $fechaLimite->format('Y-m');
        });
        $ultimoMes=null;
        foreach ($pagosFiltrados as $pago) {
            $pago->fecha_pagado = now();
            $pago->save();
            $ultimoMes=$pago->fecha_limite;
        }
        $contrato=$cliente->contrato;
        $contrato->activo=true;
        $contrato->save();
        $this->generarPago($clienteId,$ultimoMes); */
    }


}
