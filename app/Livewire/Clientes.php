<?php

namespace App\Livewire;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Zona;
use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.app')]

class Clientes extends Component
{
    
    public $editingCliente;
    public $idC;
    
    public $isEditing = false;
    
    public $clienteId;
    public $userName;
    public $userMail;
    public $userTel;
    public $userDirec;
    

    public function render()
    {
        $clientes = Cliente::all();
        $zonas= Zona::all();

        return view('livewire.clientes', ['clientes' => $clientes,'zonas'=>$zonas]);
    }

    public function openEditModal($clienteId)
    {
        $this->editingCliente = Cliente::find($clienteId);
        $this->idC=$this->editingCliente->id;
        $this->isEditing = true;
    }
    
    public function deleteCliente($clienteId)
    {
        $cliente = Cliente::find($clienteId);
    
        if ($cliente) {
            
            $cliente->delete();
            $cliente->instalacion->delete();
            $cliente->contrato->delete();
            $cliente->antena->delete();
            $cliente->router->delete();

            session()->flash('success', 'Registros de pagos y cliente eliminados exitosamente');
        }
    }


    
    public function updateCliente(){
        $clienteIdd=$this->idC;
        $cliente=Cliente::find($clienteIdd);
        $user=User::where('cliente_id', $clienteIdd)->first();
        $user->name=$this->userName;
        $user->email=$this->userMail;
        $cliente->telefono=$this->userTel;
        $cliente->direccion=$this->userDirec;
        $cliente->save();
        $user->save();
        
    $this->isEditing = false;
    session()->flash('success', 'Cliente actualizado exitosamente');

}

public function closeEditModal()
{
    $this->isEditing = false;
}

}
