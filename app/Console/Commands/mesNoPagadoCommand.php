<?php

namespace App\Console\Commands;

use App\Models\Pago;
use App\Models\Recargo;
use DateTime;
use Illuminate\Console\Command;

class mesNoPagadoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recargo:mesANT';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

                }else
                {
                    $this->crearRecargoMes($p);                    
                }
            }
        }
    }


    public function compareMes($fechaS)
{

    $fechaString=$fechaS;
    // Obtiene el año y el mes actual
    $anioActual = date("Y");
    $mesActual = date("m");

    // Crea un objeto DateTime a partir del string de fecha
    $fecha = new DateTime($fechaString);

    // Extrae el año y el mes de la fecha en el string
    $anioFecha = $fecha->format("Y");
    $mesFecha = $fecha->format("m");

    // Compara el año y el mes
    if ($anioFecha == $anioActual && $mesFecha == $mesActual - 1) {
        return true;
    } else {

        return false;
    }



}

public function crearRecargoMes($p)
{

    $pagos=Pago::all();
    
    $anioActual = date("Y");
    $mesActual = date("m");


    $fecha_limite = $anioActual . '-' . $mesActual . '-05';
    $existe=false;


                foreach ($pagos as $pa)
                {
                    
                        if($pa->fecha_limite===$fecha_limite&&$pa->cliente_id===$p->cliente_id)
                    {
                        $existe=true;
                        echo("existe"); //ya existe un pago, implementar metodo para notificar.
                        break;
                    }
                    
                    
                }

                if(!$existe)
                {
                    $recargo= new Recargo;
                    $recargo->monto="100";
                    $recargo->descripcion="Mes anterior no pagado";
                    $recargo->save();

                    $pago= new Pago;
                    $pago->fecha_limite = $fecha_limite;
                    $pago->cliente_id = $p->cliente_id;
                    $pago->tipo_servicio_id = $p->tipo_servicio_id;
                    $pago->recargo_id = $recargo->id;

                    $pago->save();
                }
            
        

    

}

}
