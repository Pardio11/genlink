<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class ContratoAPIController extends Controller
{
    public function getContrato() {
        if(Auth::user()->cliente->contrato){
            return response()->json([
                'contrato' => Auth::user()->cliente->contrato
            ], 200);
        }else{
            return response()->json([
                'contrato' => null
            ], 200);
        }
    }
}
