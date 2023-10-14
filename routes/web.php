<?php

use App\Livewire\Cancelados;
use App\Livewire\Clientes;
use App\Livewire\EstadoCuenta;
use App\Livewire\MisPagos;
use App\Livewire\PagosAtrasados;
use App\Livewire\Pendientes;
use App\Livewire\PreguntasFrecuentes;
use App\Livewire\RealizarPago;
use App\Livewire\Reportes;
use App\Livewire\ReportesAdmin;
use Illuminate\Support\Facades\Route;

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
    Route::get('/clientes',Clientes::class);
    Route::get('/estado-cuenta',EstadoCuenta::class)->name('estado-cuenta');
    Route::get('/pagos-atrasados',PagosAtrasados::class)->name('pagos-atrasados');
    Route::get('/cancelados',Cancelados::class)->name('cancelados');
    Route::get('/pendientes',Pendientes::class)->name('pendientes');
    Route::get('/reportes-admin',ReportesAdmin::class)->name('reportes-admin');
    Route::get('/realizar-pago',RealizarPago::class)->name('realizar-pago');

});