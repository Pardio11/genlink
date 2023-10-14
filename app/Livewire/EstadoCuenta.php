<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.app')]

class EstadoCuenta extends Component
{
    public function render()
    {
        return view('livewire.estado-cuenta');
    }
}
