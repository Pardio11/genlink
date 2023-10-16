<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\Reporte;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]

class ReportesAdmin extends Component
{
    public $reporteSelect;
    public $hidePopup =true;

    public function asignReporte($reporte)
    {
        
        $this->hidePopup=false;
        $this->reporteSelect = $reporte;


    }
    public function hide()
    {
        $this->hidePopup=true;
    }

    public function render()
    {
        
        $reportes = Reporte::all();

            
        return view('livewire.reportes-admin',['reportes'=>$reportes ]);
    }

  

    
}
