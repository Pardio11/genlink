<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.app')]

class HomeStatus extends Component
{
    public function render()
    {
        return view('livewire.home-status');
    }
}
