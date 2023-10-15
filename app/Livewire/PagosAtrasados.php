<?php

namespace App\Livewire;

use App\Models\Pago;
use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.app')]

class PagosAtrasados extends Component
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
    public function render()
    {
        $pagos=Pago::all();
        return view('livewire.pagos-atrasados',['pagos'=>$pagos]);
    }


}
