<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $roles = $user->getRoleNames();
        $role= $roles[0];

        if ($role=='Admin') {
            return redirect('/clientes');  
        }
        if ($role=='Cobrador') {
            return redirect('/busquedaCliente');  
        }
        return $next($request);
    }
}
