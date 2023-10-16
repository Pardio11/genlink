<?php

namespace App\Livewire;

use App\Models\Reporte;
use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.app')]

class Reportes extends Component
{

    public $asunto="Sin Conexion";
    public $descripcion;
    public $resuelto=false;
    
    

    public function render()
    {

        $reportes = Reporte::all();
        return view('livewire.reportes',['reportes'=>$reportes]);
    }

    public function agregarReporte($cliente_id)
    {
        $fecha=now();

        $this->validate([
            'asunto' => 'required',
            'descripcion' => 'required'
        ]);

         Reporte::create([
            'asunto'=>$this->asunto,
            'descripcion'=>$this->descripcion,
            'resuelto'=>$this->resuelto,
            'cliente_id'=>$cliente_id,
            'fecha'=>$fecha
        ]);
        return redirect()->route('reportes');
    }


}
