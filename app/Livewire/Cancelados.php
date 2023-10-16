<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\Contrato;
use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.app')]

class Cancelados extends Component
{
    public function render()
    {

        $clientes=Cliente::all();
        return view('livewire.cancelados',['clientes'=>$clientes]);
    }
}
