<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\Reporte;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]

class ReportesAdmin extends Component
{
    public function render()
    {
        
        $reportes = Reporte::all();

        return view('livewire.reportes-admin',['reportes'=>$reportes ]);
    }
}
