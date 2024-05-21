<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class PerfilCliente extends Component
{
    public $clienteId;
    public $cliente;
    public $selectedMonth = '';

    public function mount($clienteId)
    {
        $this->clienteId = $clienteId;
        $this->cliente = User::find($clienteId);
    }
    public function openModal($month)
    {
        $this->selectedMonth = $month;
        $this->dispatch('openModal', [
            'data' => [
                'month' => $this->selectedMonth,
                'cliente' => $this->cliente
            ]
        ]);
    }
    
    
    public function render()
    {
        return view('livewire.perfil-cliente', [
            'cliente' => $this->cliente,
        ]);
    }
}
