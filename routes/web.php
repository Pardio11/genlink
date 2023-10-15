<?php

use App\Http\Controllers\InstalacionController;
use App\Livewire\BusquedaCliente;
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
use App\Livewire\SaldoCobrador;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\Can;

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
    })->name('dashboard')->middleware('can:cliente');
    Route::get('/mis-pagos',MisPagos::class)->middleware('can:mis-pagos')->name('mis-pagos');
    Route::get('/preguntas-frecuentes',PreguntasFrecuentes::class)->middleware('can:preguntas-frecuentes')->name('preguntas-frecuentes');
    Route::get('/reportes',Reportes::class)->middleware('can:reportes')->name('reportes');

    Route::get('/clientes',Clientes::class)->middleware('can:clientes')->name('clientes');
    Route::get('/estado-cuenta',EstadoCuenta::class)->middleware('can:estado-cuenta')->name('estado-cuenta');
    Route::get('/pagos-atrasados',PagosAtrasados::class)->middleware('can:pagos-atrasados')->name('pagos-atrasados');
    Route::get('/cancelados',Cancelados::class)->middleware('can:cancelados')->name('cancelados');
    Route::get('/pendientes',Pendientes::class)->middleware('can:pendientes')->name('pendientes');
    Route::get('/reportes-admin',ReportesAdmin::class)->middleware('can:reportes-admin')->name('reportes-admin');
    
    Route::get('/realizar-pago',RealizarPago::class)->middleware('can:realizar-pago')->name('realizar-pago');
    Route::get('/busqueda-cliente',BusquedaCliente::class)->middleware('can:busqueda-cliente')->name('busqueda-cliente');
    Route::get('/saldo-cobrador',SaldoCobrador::class)->middleware('can:saldo-cobrador')->name('saldo-cobrador');

    Route::get('/asignar-instalacion/{clienteId}', [InstalacionController::class, 'asignarInstalacion']);


});

