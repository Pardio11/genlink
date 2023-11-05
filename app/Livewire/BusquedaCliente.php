<?php

namespace App\Livewire;

use App\Models\Caja;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Carbon\Carbon;

#[Layout('layouts.app')]

class BusquedaCliente extends Component
{
    //public $numeroCliente;
    public $caja;
    public $dineroCaja = 0;
    public $comision = 0;

    public function mount()
    {

        $mesActual = now()->month;
        $anoActual = now()->year;

        $caja = Auth::user()->cobrador->cajas()
            ->where('recaudado', false)
            ->whereYear('fecha', $anoActual)
            ->whereMonth('fecha', $mesActual)
            ->first();
        $this->caja = $caja;
        if ($caja != null) {
            if ($caja->pagos() != null) {
                $pagos = $caja->pagos()->with('tipoServicio')->get(); // Obtener todos los pagos con sus tipos de servicio
                $this->dineroCaja += $pagos->sum(function ($pago) {
                    return $pago->tipoServicio->costo + ($pago->recargo->monto ?? 0);
                });
                $this->comision = ($pagos->count() * 5);
            }
        } else {

            $this->caja = Caja::create([
                'fecha' => Carbon::now()->toDateString(), // Esto pondrá la fecha actual en formato 'YYYY-MM-DD'
                'cobrador_id' => Auth::user()->cobrador->id
            ]);
        }
    }
    public function render()
    {
        return view('livewire.busqueda-cliente');
    }
}
