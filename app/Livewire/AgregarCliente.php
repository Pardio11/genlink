<?php

namespace App\Livewire;

use App\Models\Antena;
use App\Models\Cliente;
use App\Models\Contrato;
use App\Models\Instalacion;
use App\Models\Router;

use App\Models\ModeloAntena;
use App\Models\ModeloRouter;
use App\Models\Pago;
use App\Models\TipoDescuento;
use App\Models\TipoServicio;
use App\Models\User;
use App\Models\Zona;
use DateTime;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
#[Layout('layouts.app')]


class AgregarCliente extends Component
{
public $cliente;
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

public $tipoServicoId=2;
public $tipoServico;
public $nota;
public $selectedInstalacion;
public $planes;
protected $listeners = ['instalacionSeleccionada'];


    public function mount()
    {
        $this->planes=TipoServicio::where('tipo', 'Plan')->get();
        $this->reset([
            'cliente',
            'user',
            'password',
            'direccion',
            'telefono',
            'correo',
        ]);
        
        $this->cliente = session('cliente');
        if($this->cliente){
            
            session()->forget('cliente');
            $this->user = $this->cliente->user->name;
            $this->password ="********";
            $this->telefono=$this->cliente->telefono;
            $this->correo=$this->cliente->user->email;
            $this->direccion=$this->cliente->direccion;
            $this->selectedInstalacion=$this->cliente->instalacion;
        }
        
    }
    
    public function render()
    {
        $Router = ModeloRouter::all();
        $Antenas = ModeloAntena::all();
        $Descuentos =TipoDescuento::all();
        $Zonas=Zona::all();
        
        return view('livewire.agregar-cliente',['routers' => $Router, 'antenas' => $Antenas,'descuentos' => $Descuentos,'zonas' => $Zonas,'cliente'=>$this->cliente]);
    }


    

    public function agregarCliente($cliente)
    {


        $this->tipoServico = TipoServicio::find($this->tipoServicoId);

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
                'precio' => $this->tipoServico->costo,
                'activo' => true,


            ]);
            if($this->password!="********"){
                $Instalacion= Instalacion::create([
                    'fecha_limite' => now(),
                    'nota' => $this->nota,
                    'realizado' => true,
                ]);
                $cliente->instalacion()->associate($Instalacion);
            }else{
                $this->selectedInstalacion->realizado = true;
                $this->selectedInstalacion->nota = $this->nota;
                $this->selectedInstalacion->save();
            }

            
            $cliente->contrato()->associate($Contrato);
            $cliente->antena()->associate($antena);
            $cliente->router()->associate($router);
            $cliente->zona_id=$this->zona_id;
            $cliente->save();
            
            // Obtener la fecha de hoy
            $fechaObjeto = new DateTime('now');

            // Añadir un mes y establecer el día en 5
            $fechaSiguienteMes = $fechaObjeto->modify('+1 month')->setDate($fechaObjeto->format('Y'), $fechaObjeto->format('m'), 5);

            // Obtener la fecha formateada en el formato deseado (Y-m-d)
            $fechaResultado = $fechaSiguienteMes->format('Y-m-d');

            Pago::create([
                'fecha_limite' => $fechaResultado, // Genera una fecha hasta el 5 del siguiente mes
                'cliente_id' => $cliente->id,
                'tipo_servicio_id' => $this->tipoServico->id
            ]);

            $this->reset([
                'cliente',
                'user',
                'password',
                'userAntena',
                'passwordAntena',
                'ipAntena',
                'macAntena',
                'userRouter',
                'passwordRouter',
                'macRouter',
                'ipRouter',
                'direccion',
                'telefono',
                'correo',
                'nota'
            ]);
            return redirect("agregar-cliente");

         }

         public function crearUser(){
            if($this->password!="********"){

            $this->validate([
                'user' => 'required',
                'password' => ['required','different:********'],
                'correo' => 'required',
                'direccion' => 'required',
                'telefono' => 'required',
            ]);

            // Validación y creación de datos del cliente
           $cliente = Cliente::create([
                'direccion' => $this->direccion,
                'telefono' => $this->telefono,
            ]);

            $user=User::create([
                'name' => $this->user,
                'email' => $this->correo,
                'password' =>  Hash::make($this->password),
                'cliente_id' =>$cliente->id
            
            ])->assignRole('Cliente');
            $this->agregarCliente($cliente);
            }else{
                $this->agregarCliente($this->cliente);
            }
        
        
        


        }
         
}
