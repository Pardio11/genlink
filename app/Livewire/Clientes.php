<?php

namespace App\Livewire;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Contrato;
use App\Models\Pago;
use App\Models\Recargo;
use DateTime;
use App\Models\Zona;

use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.app')]

class Clientes extends Component
{
    public $zona_id;
    public $estatus;

    public $editingCliente;
    public $idC;

    
    public $isEditing = false;
    
    public $clienteId;
    public $userName;
    public $userMail;
    public $userTel;
    public $userDirec;
    


/*     public function render()
    {
        $clientes = Cliente::all();
         $clientes = Cliente::when($this->zona_id, function ($query) {
            $query->whereHas('zonas', function ($query) {
                $query->where('zona_id', $this->zona_id);
            });
        })->get();

        $Pagos = Pago::all();
        $zonas = Zona::all();
    
        return view('livewire.clientes', [
            'clientes' => $clientes, 
            'pagos' => $Pagos,
            'zonas' => $zonas
        ]);
    }
     */

     public function mount()
{
    $this->zona_id = ''; // o algún valor predeterminado si es necesario
    $this->estatus = '';
}

     public function render()
{
    $clientesQuery = Cliente::query();

    if ($this->zona_id) {
        $clientesQuery->whereHas('zona', function ($query) {
            $query->where('id', $this->zona_id);
        });
    }
    
    
    
    if ($this->estatus!='') {
        
        $clientesQuery->whereHas('contrato', function ($query) {
            $query->where('activo', $this->estatus);
        });
    
    }
  
    $clientes = $clientesQuery->get();

 
 

    




    $pagos = Pago::all();
    $zonas = Zona::all();
    $contrato= Contrato::all();

    return view('livewire.clientes', [
        'clientes' => $clientes, 
        'pagos' => $pagos,
        'zonas' => $zonas,
        'contrato'=>$contrato,

    ]);
}

    public function openFilter($clienteId)
    {
        $this->editingCliente = Cliente::find($clienteId);
        $this->idC=$this->editingCliente->id;
        $this->isEditing = true;
    }
    public function applyFilter()
    {
    
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
        if(isset($this->userName))
        {
            $user->name=$this->userName;
        }
        if(isset($this->userMail))
        {
            $user->email=$this->userMail;
        
        }
        if(isset($this->userTel)){$cliente->telefono=$this->userTel;}
        if(isset($this->userDirec)){$cliente->direccion=$this->userDirec;}

        
        $cliente->save();
        $user->save();
        
    $this->isEditing = false;
    session()->flash('success', 'Cliente actualizado exitosamente');

}

public function closeEditModal()
{
    $this->isEditing = false;
}

public function compare()
{

    $dia_actual = date('d');

if ($dia_actual == '04') {
    return true;
} else {
    return false;
}

}

public function compareMes($fechaS)
{

    $fechaString=$fechaS;

    // Obtiene la fecha actual y extrae el mes
    $mesActual = date("m");

    // Crea un objeto DateTime a partir del string de fecha
    $fecha = new DateTime($fechaString);

    // Extrae el mes de la fecha en el string
    $mesFecha = $fecha->format("m");

    // Compara los meses
    if ($mesFecha == $mesActual-1) {
        return true;
    } else {
    return false;
    }



}

public function crearRecargo($idPago)
{

    $recargo= new Recargo;
    $recargo->monto="50";
    $recargo->descripcion="Recargo desde controller";
    $recargo->save();

    $pago = Pago::find($idPago);

    if ($pago) {
        // Actualizar el campo 'retraso_id' del pago con el ID del nuevo retraso
        $pago->recargo_id = $recargo->id;
        $pago->save();

        return 'Retraso creado y campo retraso_id actualizado exitosamente';
    } else {
        return 'Pago no encontrado';
    }

}

    

}