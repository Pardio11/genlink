<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Reporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class ReporteAPIController extends Controller
{

    public function getReportes() {
        if(Auth::user()->cliente->reportes){
            return response()->json([
                'reportes' => Auth::user()->cliente->reportes
            ], 200);
        }else{
            return response()->json([
                'reportes' => null
            ], 200);
        }
    }
    public function agregarReporte(Request $request)
    {
        $fecha=now();

        $validator = Validator::make($request->all(), [
            'asunto' => 'required',
            'descripcion' => 'required'
        ]);
        if($validator->fails()) {
            return response()->json([
                'message' => 'Datos invalidos'
            ], 400);
        }

         Reporte::create([
            'asunto'=>$request->asunto,
            'descripcion'=>$request->descripcion,
            'resuelto'=>false,
            'cliente_id'=>Auth::user()->cliente->id,
            'fecha'=>$fecha
        ]);
        return response()->json([
            'message' => 'Reporte creado correctamente'
        ], 200);
    }
}
