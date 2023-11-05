<?php

namespace App\Livewire;

use App\Models\Caja;
use App\Models\Pago;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Carbon\Carbon;
#[Layout('layouts.app')]
class EstadoCuenta extends Component
{
    public $selectedYear;
    public $selectedMonth;
    public $nameMonth;
    public $years = [];
    public $cajas;

    public function mount()
    {
        $this->years = range(1990, Carbon::now()->year);
        $this->selectedYear = Carbon::now()->year;
        $this->setSelectedMonth(Carbon::now()->month);  
    }
    public function recaudarCaja($caja_id)
    {
        $caja = Caja::find($caja_id);
        if ($caja) {
            $caja->recaudado = true;
            $caja->save();
        }
    }
    public function cajaRecaudado()
    {
        $inicioMes = Carbon::create($this->selectedYear, $this->selectedMonth, 1)->startOfMonth();
        $finMes = Carbon::create($this->selectedYear, $this->selectedMonth, 1)->endOfMonth();

        $sumaPagos = Pago::whereBetween('fecha_pagado', [$inicioMes, $finMes])
                        ->with(['tipoServicio'])
                        ->get()
                        ->reduce(function ($carry, $pago) {
                            // Suma el costo del servicio al acumulador
                            $carry += $pago->tipoServicio->costo;
                            // Si existe un recargo, lo suma también
                            $carry += optional($pago->recargo)->monto ?? 0;
                            return $carry;
                        }, 0.0);

        return $sumaPagos;
    }
    public function cajaCobrado()
{
    $inicioMes = Carbon::create($this->selectedYear, $this->selectedMonth, 1)->startOfMonth();
    $finMes = Carbon::create($this->selectedYear, $this->selectedMonth, 1)->endOfMonth();

    $sumaPagos = Pago::whereHas('caja', function ($query) {
                        $query->where('recaudado', true);
                    })
                    ->whereBetween('fecha_pagado', [$inicioMes, $finMes])
                    ->with(['tipoServicio', 'recargo', 'caja'])
                    ->get()
                    ->reduce(function ($carry, $pago) {
                        // Asegúrate que el pago corresponde a una caja recaudada
                        if ($pago->caja && $pago->caja->recaudado) {
                            // Suma el costo del servicio al acumulador
                            $carry += $pago->tipoServicio->costo;
                            // Si existe un recargo, lo suma también
                            $carry += optional($pago->recargo)->monto ?? 0;
                        }
                        return $carry;
                    }, 0.0);

    return $sumaPagos;
}

public function cajaPendiente()
{
    $inicioMes = Carbon::create($this->selectedYear, $this->selectedMonth, 1)->startOfMonth();
    $finMes = Carbon::create($this->selectedYear, $this->selectedMonth, 1)->endOfMonth();

    $sumaPagos = Pago::whereHas('caja', function ($query) {
                        $query->where('recaudado', false);
                    })
                    ->whereBetween('fecha_pagado', [$inicioMes, $finMes])
                    ->with(['tipoServicio', 'recargo', 'caja'])
                    ->get()
                    ->reduce(function ($carry, $pago) {
                        // Asegúrate que el pago corresponde a una caja recaudada
                        if ($pago->caja ) {
                            // Suma el costo del servicio al acumulador
                            $carry += $pago->tipoServicio->costo;
                            // Si existe un recargo, lo suma también
                            $carry += optional($pago->recargo)->monto ?? 0;
                        }
                        return $carry;
                    }, 0.0);

    return $sumaPagos;
}

    public function calcularCaja($caja)
    {
        $dineroCaja=0;
        if ($caja->pagos() != null) {
            $pagos = $caja->pagos()->with('tipoServicio')->get(); // Obtener todos los pagos con sus tipos de servicio
            $dineroCaja += $pagos->sum(function ($pago) {
                return $pago->tipoServicio->costo + ($pago->recargo->monto ?? 0);
            });
        }
        return $dineroCaja;
    }
    public function calcularComision($caja)
    {
        $comision=0;
        if ($caja->pagos() != null) {
            $pagos = $caja->pagos()->with('tipoServicio')->get(); // Obtener todos los pagos con sus tipos de servicio
            $comision = ($pagos->count() * 5);
        }
        return $comision;
    }
    public function loadCajas()
    {
        $this->cajas = Caja::whereYear('fecha', $this->selectedYear)->whereMonth('fecha', $this->selectedMonth)->get();
    }
    public function setSelectedMonth($month)
    {
        $this->selectedMonth =$month; 
        $this->nameMonth = ucfirst(Carbon::now()->month($this->selectedMonth)->translatedFormat('F'));
        $this->loadCajas();
    }

    public function render()
    {
        return view('livewire.estado-cuenta', [
            'years' => $this->years,
            'selectedYear' => $this->selectedYear,
        ]);
    }
}

