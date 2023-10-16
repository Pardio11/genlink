<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Reporte;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reporte $reporte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reporte $reporte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reporte $reporte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reporte $reporte)
    {
        //
    
    }

    public function resolverReporte($repoteId)
    {
        $reporte = Reporte::find($repoteId);
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
