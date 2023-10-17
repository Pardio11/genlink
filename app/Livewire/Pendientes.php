<?php

namespace App\Livewire;

use App\Models\Instalacion;
use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.app')]

class Pendientes extends AgregarCliente
{


    public function render()
    {

        $instalacion=Instalacion::all();
        return view('livewire.pendientes',['instalacion'=>$instalacion ]);
    }
 // En tu componente Pendientes.php
public function selectInstalacion($instalacionId) {

    $selectedInstalacion = Instalacion::find($instalacionId);
    $cliente=$selectedInstalacion->cliente;
    $this->cliente=$cliente;
    session(['cliente' => $cliente]);
    return redirect("agregar-cliente");
     
}

}
