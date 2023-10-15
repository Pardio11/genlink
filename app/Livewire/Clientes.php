<?php

namespace App\Livewire;

use App\Models\Cliente;
use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.app')]

class Clientes extends Component
{
    public function render()
    {
        $clientes = Cliente::all();

        return view('livewire.clientes', ['clientes' => $clientes]);
    }

}
