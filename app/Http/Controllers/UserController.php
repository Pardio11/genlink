<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function eliminar($id)
{
    $user = User::find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'Usuario no encontrado');
    }
    
    $user->delete();

    return redirect()->back()->with('success', 'Instalación creada y asignada exitosamente.');
}
}
