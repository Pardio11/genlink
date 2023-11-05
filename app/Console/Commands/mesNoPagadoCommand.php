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
                    $this->crearRecargoMes($p->cliente_id);                    
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

public function crearRecargoMes($cliente_id)
{

    $pagos = Pago::all();

    $anioActual = date("Y");
    $mesActual = date("m");

    
    

    



    foreach ($pagos as $p)
    {
        $fechaPago= new DateTime($p->fecha_limite);
        $anioFecha= $fechaPago->format("Y");
        $mesFecha = $fechaPago->format("m");

        if ($anioFecha == $anioActual && $mesFecha == $mesActual) 
        {
            if($p->recargo_id===NULL&&$p->cliente_id===$cliente_id)
            {
                $recargo= new Recargo;
                $recargo->monto="100";
                $recargo->descripcion="Mes anteriro no pagado desde controller";
                $recargo->save();
                $p->recargo_id = $recargo->id;
                $p->save();
            }
            
        } else 
        {

            
        }

    }


    

}

}
