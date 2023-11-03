<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]

class BusquedaCliente extends Component
{
    //public $numeroCliente;
    public $dineroCaja = 0;
    public $comision = 0;
    public function calcularCaja()
    {
        $this->dineroCaja = 2222;
    }
    public function mount()
    {

        $mesActual = now()->month;
        $anoActual = now()->year;

        $caja = Auth::user()->cobrador->cajas()
            ->whereYear('fecha', $anoActual)
            ->whereMonth('fecha', $mesActual)
            ->first();
        if ($caja != null)
            if ($caja->pagos() != null) {
                $pagos = $caja->pagos()->with('tipoServicio')->get(); // Obtener todos los pagos con sus tipos de servicio
                $this->dineroCaja  = $pagos->pluck('tipoServicio.costo')->sum();
                $this->comision = ($pagos->count() * 5);
            }
    }
    public function render()
    {
        return view('livewire.busqueda-cliente');
    }
}
