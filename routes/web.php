<?php

use App\Livewire\MisPagos;
use App\Livewire\PreguntasFrecuentes;
use App\Livewire\Prueba;
use App\Livewire\Reportes;
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


    Route::get('/clientes',Clientes::class)->name('clientes');
    Route::get('/estado-cuenta',EstadoCuenta::class)->name('estado-cuenta');
    Route::get('/pagos-atrasados',PagosAtrasados::class)->name('pagos-atrasados');
    Route::get('/cancelados',Cancelados::class)->name('cancelados');
    Route::get('/pendientes',Pendientes::class)->name('pendientes');
    Route::get('/reportes-admin',ReportesAdmin::class)->name('reportes-admin');

});