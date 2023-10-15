<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Instalacion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InstalacionController extends Controller
{
    public function asignarInstalacion($clienteId)
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
        $cliente = Cliente::find($clienteId);
        $cliente->instalacion()->associate($instalacion);
        $cliente->save();

        return redirect()->back()->with('success', 'Instalación creada y asignada exitosamente.');
    }
}
