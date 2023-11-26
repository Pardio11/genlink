<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginAPIController extends Controller
{
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if($validator->fails()) {
            return response()->json([
                'message' => 'Acceso denegado'
            ], 401);
        } else {
            $credentials = $validator->validated();
            if (Auth::attempt($credentials)) {
                return response()->json([
                    'token' => $request->user()->createToken('API')->plainTextToken
                ]);
            } else {
                return response()->json([
                    'message' => 'Acceso denegado'
                ], 401);
            }
        }
    }
}
