<?php

namespace App\Console\Commands;

use App\Models\Contrato;
use App\Models\Pago;
use DateTime;
use Illuminate\Console\Command;

class contratoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contrato:change';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando se ejecutara cada dia 13 del mes, 
    compara si el mes fue pagado, en caso de que no el estado del contraro cambiara a false';

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
                    
                        $this->desactivarContrato($p->cliente->contrato_id);

                    
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

public function desactivarContrato($idContrato)
{
    $contrato = Contrato::find($idContrato);

    if ($contrato&&$contrato->activo) {

        
        $contrato->activo = false;
        $contrato->save();

        
    } else {
        
    }
}


}
