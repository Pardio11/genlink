<?php

namespace App\Livewire;

use App\Models\Pago;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.app')]

class PagosAtrasados extends Component
{
    
   
    public function compararFecha($fechaLimite)
    {
        $fechaActual = now(); 
        $fechaLimite = Carbon::createFromFormat('Y-m-d', $fechaLimite);
    
        if ($fechaActual->format('Y-m') == $fechaLimite->format('Y-m')) {
            return true;
        } else {
            return false;
        }
        
    }
    public function render()
    {
        $pagos=Pago::all();
        return view('livewire.pagos-atrasados',['pagos'=>$pagos]);
    }


}
