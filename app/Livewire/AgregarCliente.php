<?php

namespace App\Livewire;

use App\Models\Antena;
use App\Models\Cliente;
use App\Models\Contrato;
use App\Models\Instalacion;
use App\Models\Router;

use App\Models\ModeloAntena;
use App\Models\ModeloRouter;
use App\Models\TipoDescuento;
use App\Models\User;
use App\Models\Zona;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
#[Layout('layouts.app')]


class AgregarCliente extends Component
{
    public $user;
    public $password;
    public $userAntena;

public $passwordAntena;
public $ipAntena; // Agrega la propiedad para la IP
public $macAntena; // Agrega la propiedad para la MAC
public $modelo_antena_id = 1;

public $userRouter;
public $passwordRouter;
public $macRouter; // Agrega la propiedad para la MAC del Router
public $ipRouter; // Agrega la propiedad para la IP del Router
public $modelo_router_id = 1;

public $direccion;


public $telefono;
public $correo; // Agrega la propiedad para el correo

public $zona_id=1;

public $precio=230;

public $nota;

public $selectedInstalacion;


    
    public function render()
    {
        $Router = ModeloRouter::all();
        $Antenas = ModeloAntena::all();
        $Descuentos =TipoDescuento::all();
        $Zonas=Zona::all();

        return view('livewire.agregar-cliente',['routers' => $Router, 'antenas' => $Antenas,'descuentos' => $Descuentos,'zonas' => $Zonas]);
    }
    

    public function agregarCliente($cliente)
    {


        
        // ///////////////////////////////////////////////////////////////CLIENTE////////////////////////////////////////////////////////////////////


             // Validación y creación de datos de la antena
             $this->validate([
                 'userAntena' => 'required',
                 'passwordAntena' => 'required',
                 'ipAntena' => 'required',
                 'macAntena' => 'required',
                 'modelo_antena_id' => 'required|exists:modelo_antenas,id',
             ]);
         
            $antena= Antena::create([
                 'user' => $this->userAntena,
                 'password' => $this->passwordAntena,
                 'ip' => $this->ipAntena,
                 'mac' => $this->macAntena,
                 'modelo_antena_id' => $this->modelo_antena_id,
             ]);
         
             // Validación y creación de datos del router
             $this->validate([
                 'userRouter' => 'required',
                 'passwordRouter' => 'required',
                 'ipRouter' => 'required',
                 'macRouter' => 'required',
                 'modelo_router_id' => 'required|exists:modelo_routers,id',
             ]);
         
             $router=Router::create([
                 'user' => $this->userRouter,
                 'password' => $this->passwordRouter,
                 'ip' => $this->ipRouter,
                 'mac' => $this->macRouter,
                 'modelo_router_id' => $this->modelo_router_id,
             ]);



                          // Validación para los campos de usuario
             $this->validate([
                 'direccion' => 'required',
                 'telefono' => 'required',
             ]);



             $Contrato= Contrato::create([
                'dia_corte' => 5,
                'velocidad' => "50 megas",
                'precio' => $this->precio,
                'activo' => true,


            ]);

            $Instalacion= Instalacion::create([
                'fecha_limite' => now(),
                'nota' => $this->nota,
                'realizado' => true,
            ]);
            $cliente->instalacion()->associate($Instalacion);
            $cliente->contrato()->associate($Contrato);
            $cliente->antena()->associate($antena);
            $cliente->router()->associate($router);
            $cliente->zona_id=$this->zona_id;
            $cliente->save();
            return redirect("agregar-cliente");

         }

         public function crearUser(){
            $this->validate([
                'direccion' => 'required',
                'telefono' => 'required',
            ]);

            // Validación y creación de datos del cliente
           $cliente = Cliente::create([
                'direccion' => $this->direccion,
                'telefono' => $this->telefono,
            ]);
    
            $this->validate([
                'user' => 'required',
                'password' => 'required',
                'correo' => 'required',
            ]);

            $user=User::create([
                'name' => $this->user,
                'email' => $this->correo,
                'password' =>  Hash::make($this->password),
                'cliente_id' =>$cliente->id
            
            ])->assignRole('Cliente');

        $this->agregarCliente($cliente);
        
        


        }
         
}
