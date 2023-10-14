<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]

class ReportesAdmin extends Component
{
    public function render()
    {
        return view('livewire.reportes-admin');
    }
}
