<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Recargo;
use Illuminate\Http\Request;

class RecargoAPIController extends Controller
{
    public function getRecargo(string $id) {
        $recargo = Recargo::find($id);
        if($recargo){
            return response()->json([
                'recargo' => $recargo
            ], 200);
        }else{
            return response()->json([
                'message' => 'Recargo Inexistente'
            ], 400);
        }
    }
}
