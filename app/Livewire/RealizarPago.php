<?php

namespace App\Livewire;

use App\Models\Caja;
use App\Models\Cliente;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Http\Request;

#[Layout('layouts.app')]

class RealizarPago extends Component
{
    public $cliente;
    public $pagos;
    public $caja_id;
    public $mesFechaLimite;
    public function mount(Request $request)
    {
        $numeroCliente = $request->numeroCliente;
        $this->caja_id=$request->caja_id;
        $this->cliente = Cliente::where('n_id', $numeroCliente)->first();
        if ($this->cliente == null) {
            return redirect()->route('busquedaCliente')->with('error', 'Cliente no encontrado');
        }

        $this->pagos = $this->cliente->pagos()->whereNull('fecha_pagado')->where(function ($query) {
                $now = Carbon::now();
                // Aquí simplemente comparamos que la fecha_limite sea mayor o igual al primer día del mes actual
                $query->where('fecha_limite', '>=', $now->startOfMonth());
        }) ->get();
        $this->mesFechaLimite = Carbon::parse($this->pagos->first()->fecha_limite)->translatedFormat('F');
    }
    public function render()
    {
        return view('livewire.realizar-pago');
    }
}
