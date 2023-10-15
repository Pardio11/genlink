<?php

namespace App\Livewire;

use App\Models\Antena;
use App\Models\ModeloAntena;
use App\Models\ModeloRouter;
use App\Models\TipoDescuento;
use App\Models\TipoServicio;
use App\Models\Zona;
use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.app')]

class AgregarObj extends Component

{
    public $nombreTipoDescuento;
    public $montoTipoDescuento;

    public $nombreTipoServicio;
    public $costoTipoServicio;

    public $modeloAntena;
    public $marcaAntena;

    public $modeloRouter;
    public $marcaRouter;

    public $nombre;
    public $direccion;
    public $alcance;
    public $router_id=1;
    public $antena_id=1;



    public $user;
    public $password;
    public $ip;
    public $mac;
    public $modelo_antena_id=1;
    

    public function render()
    {
        $Router = ModeloRouter::all();
        $Antenas = ModeloAntena::all();

        return view('livewire.agregar-obj', ['routers' => $Router, 'antenas' => $Antenas]);
    }

    
    public function agregarTipoDescuento()
    {
        $this->validate([
            'nombreTipoDescuento' => 'required',
            'montoTipoDescuento' => 'required|numeric',
        ]);

        TipoDescuento::create([
            'nombre' => $this->nombreTipoDescuento,
            'monto' => $this->montoTipoDescuento,
        ]);

        // Limpiar los campos después de agregar
        $this->nombreTipoDescuento = '';
        $this->montoTipoDescuento = '';

        // Emitir un evento para recargar la vista
    }
    public function guardarTipoServicio()
{
    // Validar los datos del formulario
    $this->validate([
        'nombreTipoServicio' => 'required|string|max:255',
        'costoTipoServicio' => 'required|numeric',
    ]);

    // Crear una nueva instancia del modelo TipoServicio
    $tipoServicio = new TipoServicio();
    $tipoServicio->nombre = $this->nombreTipoServicio;
    $tipoServicio->costo = $this->costoTipoServicio;

    // Guardar el nuevo Tipo de Servicio en la base de datos
    $tipoServicio->save();

    // Emitir el evento

    // Restablecer los campos del formulario
    $this->nombreTipoServicio = '';
    $this->costoTipoServicio = '';
}

public function guardarModeloAntena()
{
    // Valida los campos del formulario si es necesario

    $this->validate([
        'modeloAntena' => 'required|string',
        'marcaAntena' => 'required|string',
    ]);

    // Crea un nuevo Modelo de Antena en la base de datos
    ModeloAntena::create([
        'modelo' => $this->modeloAntena,
        'marca' => $this->marcaAntena,
    ]);

    // Limpia los campos del formulario
    $this->reset(['modeloAntena', 'marcaAntena']);

    // Emite un evento para notificar que el Modelo de Antena ha sido guardado
    $this->emit('modeloAntenaGuardado');

    // Puedes agregar un mensaje de éxito si lo deseas
    session()->flash('success', 'Modelo de Antena guardado con éxito');
}

public function guardarModeloRouter()
{
    // Valida los campos del formulario si es necesario
    $this->validate([
        'modeloRouter' => 'required|string',
        'marcaRouter' => 'required|string',
    ]);

    // Crea un nuevo Modelo de Antena en la base de datos
    ModeloRouter::create([
        'modelo' => $this->modeloRouter,
        'marca' => $this->marcaRouter,
    ]);

    // Limpia los campos del formulario
    $this->reset(['modeloRouter', 'marcaRouter']);

    // Puedes agregar un mensaje de éxito si lo deseas
    session()->flash('success', 'Modelo de Antena guardado con éxito');
}
public function guardarZona()
{




    
    // Crea una nueva zona y guarda los datos en la base de datos
    Zona::create([
        'nombre' => $this->nombre,
        'direccion' => $this->direccion,
        'alcance' => $this->alcance,
        'router_id' => $this->router_id,
        'antena_id' => $this->antena_id,


    ]);

    // Limpiar los campos después de guardar
    $this->nombre = '';
    $this->direccion = '';
    $this->alcance = '';
    $this->router_id = null;
    $this->antena_id = null;

    session()->flash('success', 'Zona guardada con éxito');
}


public function storeAntena()
{

    // Validate the Antena form data
    $this->validate([
        'user' => 'required',
        'password' => 'required',
        'ip' => 'required',
        'mac' => 'required',
        'modelo_antena_id' => 'required|exists:modelo_antenas,id',
    ]);

    // Create a new Antena instance and save it to the database
    Antena::create([
        'user' => $this->user,
        'password' => $this->password,
        'ip' => $this->ip,
        'mac' => $this->mac,
        'modelo_antena_id' => $this->modelo_antena_id,
    ]);

        // Clear the input fields after submission
        $this->user = '';
        $this->password = '';
        $this->ip = '';
        $this->mac = '';
        $this->modelo_antena_id = null;

    // Emit an event or return a response
}




}

