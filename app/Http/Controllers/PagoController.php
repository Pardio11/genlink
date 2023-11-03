<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pago;
use DateTime;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function generarPago($clienteId,$fecha)
    {
        // Convertir la cadena a un objeto de fecha
        $fechaObjeto = new DateTime($fecha);

        // Añadir un mes y establecer el día en 5
        $fechaSiguienteMes = $fechaObjeto->modify('+1 month')->setDate($fechaObjeto->format('Y'), $fechaObjeto->format('m'), 5);

        // Obtener la fecha formateada en el formato deseado (Y-m-d)
        $fechaResultado = $fechaSiguienteMes->format('Y-m-d');

        Pago::create([
            'fecha_limite' => $fechaResultado, // Genera una fecha hasta el 31 de diciembre de 2024
            'cliente_id' => $clienteId,
            'tipo_servicio_id' => 2
        ]);
        
    }
    public function realizarPago($pagoId, $redirect=true)
    {
        $pago = Pago::find($pagoId);
        
        $fechaLimite = \Carbon\Carbon::parse($pago->fecha_limite);
        $fechaActual = now();
        if($fechaActual->format('Y-m') <= $fechaLimite->format('Y-m') && $pago->fecha_pagado == null){
            $ultimoMes=null;

            $pago->fecha_pagado = now();
            $pago->save();
            $ultimoMes=$pago->fecha_limite;
            $cliente=$pago->cliente;
            $contrato=$cliente->contrato;
            $contrato->activo=true;
            $contrato->save();
            $this->generarPago($cliente->id,$ultimoMes);
        }
        if($redirect){
            dd("redir");
            return redirect()->back()->with('success', 'Pago exitoso.');
        }
        
    }
}
