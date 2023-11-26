<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Instalacion;
use Carbon\Carbon;
class InstalacionAPIController extends Controller
{
    public function asignarInstalacion()
    {
        // Obtener la fecha actual
        $fechaActual = Carbon::now();

        // Añadir 7 días a la fecha actual
        $fechaLimite = $fechaActual->addDays(7);

        // Crear una nueva instalación con la fecha límite calculada
        $instalacion = Instalacion::create([
            'fecha_limite' => $fechaLimite,
            'nota' => 'Nota de la instalación', // Agrega la nota que desees
            'realizado' => false, // Establece si está realizado o no
        ]);

        // Asignar la instalación al cliente
        $cliente = Auth::user()->cliente;
        $cliente->instalacion()->associate($instalacion);
        $cliente->save();
        return response()->json([
            'message' => "Se asigno la instalacion correctamente"
        ], 200);
    }

    public function getInstalacion() {
        if(Auth::user()->cliente->instalacion){
            return response()->json([
                'instalacion' => Auth::user()->cliente->instalacion
            ], 200);
        }else{
            return response()->json([
                'instalacion' => null
            ], 200);
        }
    }
}
