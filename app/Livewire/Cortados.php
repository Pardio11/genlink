<?php

namespace App\Livewire;

use App\Models\Contrato;
use DateTime;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]

class Cortados extends Component
{
    public function render()
    {
        $contratos=Contrato::all();
        return view('livewire.cortados',['contratos'=>$contratos]);
    }

    public function obtenerFecha($pago)
    {

        $fecha=$pago[count($pago)-1]->fecha_limite;
         // Convertir la cadena a un objeto de fecha
         $fechaObjeto = new DateTime($fecha);

         // Añadir un mes y establecer el día en 5
         $fechaSiguienteMes = $fechaObjeto->setDate($fechaObjeto->format('Y'), $fechaObjeto->format('m'), 15);
 
         // Obtener la fecha formateada en el formato deseado (Y-m-d)
         $fechaResultado = $fechaSiguienteMes->format('Y-m-d');
         return $fechaResultado;


    }
}
