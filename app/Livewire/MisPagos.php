<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.app')]

class MisPagos extends Component
{
    public function compararFecha($fechaLimite)
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
