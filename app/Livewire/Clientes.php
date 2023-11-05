<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\Pago;
use App\Models\Recargo;
use DateTime;
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
        $Pagos=Pago::all();

        return view('livewire.clientes', ['clientes' => $clientes, 'pagos' => $Pagos]);
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
            $cliente->instalacion->delete();
            $cliente->contrato->delete();
            $cliente->antena->delete();
            $cliente->router->delete();

            session()->flash('success', 'Registros de pagos y cliente eliminados exitosamente');
        }
    }
    
    
    public function updateCliente()
{
    $this->editingCliente->save();
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
