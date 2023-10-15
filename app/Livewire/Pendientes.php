<?php

namespace App\Livewire;

use App\Models\Instalacion;
use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.app')]

class Pendientes extends Component
{
    public function render()
    {

        $instalacion=Instalacion::all();
        return view('livewire.pendientes',['instalacion'=>$instalacion ]);
    }
}
