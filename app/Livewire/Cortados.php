<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]

class Cortados extends Component
{
    public function render()
    {
        return view('livewire.cortados');
    }
}
