<?php

namespace App\Console\Commands;

use App\Models\Pago;
use App\Models\Recargo;
use DateTime;
use Illuminate\Console\Command;
use Psy\Readline\Hoa\Console;

class recargoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recargo:created';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'mediante este comando se crean los recargos despues del dia 5';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $pagos=Pago::all();

        foreach ($pagos as $p) 
        {
            if ($this->compareMes($p->fecha_limite))
            {
                if ($this->compareMes($p->fecha_pagado)&&($p->fecha_pagado!=NULL))
                {

                    echo("tiene");

                }else{
                    if($p->recargo_id===NULL){
                        $this->crearRecargo($p->id);

                    }
                }
            }
        }



        
    }

  

public function compareMes($fechaS)
{

    $fechaString=$fechaS;

    // Obtiene la fecha actual y extrae el mes y el año
    $mesActual = date("m");
    $anioActual = date("Y");

    // Crea un objeto DateTime a partir del string de fecha
    $fecha = new DateTime($fechaString);

    // Extrae el mes de la fecha en el string
    $mesFecha = $fecha->format("m");
    $anioFecha = $fecha->format("Y");
    // Compara los meses
    if ($mesFecha == $mesActual&& $anioFecha == $anioActual) {
        return true;
    } else {
    return false;
    }



}

public function crearRecargo($idPago)
{

    $recargo= new Recargo;
    $recargo->monto="50";
    $recargo->descripcion="Pago Atrasado :(";
    $recargo->save();

    $pago = Pago::find($idPago);

    if ($pago) {
        // Actualizar el campo 'retraso_id' del pago con el ID del nuevo retraso
        $pago->recargo_id = $recargo->id;
        $pago->save();

        
    } else 
    {
        
    }

}
}
