<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.app')]

class MisPagos extends Component
{
    public function compararFecha($fechaLimite)
{
    $fechaActual = now(); 
    $fechaLimite = Carbon::createFromFormat('Y-m-d', $fechaLimite);

    if ($fechaActual->format('m-Y') > $fechaLimite->format('m-Y')) {
        return false;
    } else {
        return true;
    }
}
    public function pasoCorte($fechaLimite)
    {
        $fechaActual = now(); 
        if ($fechaActual->gt($fechaLimite)) {
            return false;
        } else {
            return true;
        }
        
    }

    function obtenerMes($fecha) {
        $mes = date('M', strtotime($fecha));
        return $mes;
    }
    function calcularTotal($pago) {
        $total=0;
        if($pago->tipoServicio)
            $total+=$pago->tipoServicio->costo;
        if($pago->recargo)
            $total+=$pago->recargo->monto;  
        return $total;
    }
    public function render()
    {  
        return view('livewire.mis-pagos');
    }
}
