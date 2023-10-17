<?php

namespace App\Livewire;

use App\Models\Cliente;
use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.app')]

class Clientes extends Component
{
    public $editingCliente;
    public $isEditing = false;

  

    public function render()
    {
        $clientes = Cliente::all();

        return view('livewire.clientes', ['clientes' => $clientes]);
    }

    public function openEditModal($clienteId)
    {
        $this->editingCliente = Cliente::find($clienteId);
        $this->isEditing = true;
    }
    
    public function deleteCliente($clienteId)
    {
        $cliente = Cliente::find($clienteId);
    
        if ($cliente) {
            $cliente->delete();
    
            session()->flash('success', 'Registros de reportes y cliente eliminados exitosamente');
        }
    }
    
    
    
    public function updateCliente()
    {
        
        dd($this->editingCliente);
        $this->validate([
            'editingCliente.direccion' => 'required',
            'editingCliente.telefono' => 'required',
            // Agrega validaciones para otros campos si es necesario
        ]);
    
        $this->editingCliente->save();
        $this->isEditing = false;
    
        session()->flash('success', 'Cliente actualizado exitosamente');
    }
    

public function closeEditModal()
{
    $this->isEditing = false;
}


    

}
