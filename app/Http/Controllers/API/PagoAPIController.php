<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PagoAPIController extends Controller
{
    public function getPagos() {
        if(Auth::user()->cliente->pagos){
            return response()->json([
                'pagos' => Auth::user()->cliente->pagos
            ], 200);
        }else{
            return response()->json([
                'pagos' => null
            ], 500);
        }
    }
}
