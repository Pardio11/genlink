<?php

namespace App\Livewire;

use App\Models\Contrato;
use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.app')]

class Cancelados extends Component
{
    public function render()
    {

        $contratos=Contrato::all();
        return view('livewire.cancelados',['contratos'=>$contratos]);
    }
}
