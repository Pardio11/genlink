<?php

use App\Livewire\Cancelados;
use App\Livewire\Clientes;
use App\Livewire\EstadoCuenta;
use App\Livewire\PagosAtrasados;
use App\Livewire\Pendientes;
use App\Livewire\MisPagos;
use App\Livewire\PreguntasFrecuentes;
use App\Livewire\Prueba;
use App\Livewire\Reportes;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/mis-pagos',MisPagos::class)->name('mis-pagos');
    Route::get('/reportes',Reportes::class)->name('reportes');
    Route::get('/preguntas-frecuentes',PreguntasFrecuentes::class)->name('preguntas-frecuentes');
});





