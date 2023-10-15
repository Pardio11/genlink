<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Instalacion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InstalacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Instalacion $instalacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instalacion $instalacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instalacion $instalacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instalacion $instalacion)
    {
        //
    }
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
