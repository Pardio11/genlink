<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class UserAPIController extends Controller
{
    public function getUser() {
        if(Auth::user()){
            return response()->json([
                'user' => Auth::user()
            ], 200);
        }else{
            return response()->json([
                'user' => null
            ], 500);
        }
    }

    public function registerUser(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
        ]);
        if($validator->fails()) {
            return response()->json([
                'message' => 'Registro Fallido'
            ], 400);
        } else {
            $cliente = Cliente::create([
                'direccion' => $request['direccion'], 
                'telefono' => $request['telefono'], 
            ]);
            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'cliente_id' => $cliente->id
            ])->assignRole('Cliente');
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $credentials = $validator->validated();
            if (Auth::attempt($credentials)) {
                return response()->json([
                    'token' => $request->user()->createToken('API')->plainTextToken
                ],200);
            } else {
                return response()->json([
                    'message' => 'Acceso denegado'
                ], 401);
            }
        }
    }
}
