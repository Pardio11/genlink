<?php

namespace App\Livewire;

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
    public $mesFechaLimite;
    public function mount(Request $request){
        $numeroCliente=$request->numeroCliente;
        $this->cliente=Cliente::where('n_id', $numeroCliente)->first();
        if($this->cliente == null){
            return redirect()->route('busquedaCliente')->with('error', 'Cliente no encontrado');
        }
        $this->pagos = $this->cliente->pagos()->whereNull('fecha_pagado')->where(function ($query) {
            $query->whereYear('fecha_limite', '<', Carbon::now()->year)
                ->orWhere(function ($query) {
                    $query->whereYear('fecha_limite', Carbon::now()->year)
                        ->whereMonth('fecha_limite', '>=', Carbon::now()->month);
                });
        })->get();
        $this->mesFechaLimite = date('F', strtotime($this->pagos->first()->fecha_limite));
    }
    public function render()
    {
        return view('livewire.realizar-pago');
    }
}
