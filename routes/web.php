<?php

use App\Http\Controllers\CajaController;
use App\Http\Controllers\InstalacionController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\UserController;
use App\Livewire\AgregarCliente;
use App\Livewire\AgregarObj;
use App\Livewire\BusquedaCliente;
use App\Livewire\Cancelados;
use App\Livewire\Clientes;
use App\Livewire\EstadoCuenta;
use App\Livewire\MisPagos;
use App\Livewire\PagosAtrasados;
use App\Livewire\Pendientes;
use App\Livewire\PreguntasFrecuentes;
use App\Livewire\Provedores;
use App\Livewire\RealizarPago;
use App\Livewire\Reportes;
use App\Livewire\ReportesAdmin;
use App\Livewire\SaldoCobrador;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\Can;
use Facturapi\Facturapi;


Route::get('/', function () {
    return view('welcome');
});
Route::middleware([
    'role',
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
    Route::get('/asignar-instalacion/{clienteId}', [InstalacionController::class, 'asignarInstalacion']);
    Route::post('/paypal/payment',[PaypalController::class,'payment'])->name('paypal');
    Route::get('/paypal/success/{clienteId}',[PaypalController::class,'success'])->name('paypal_success');
    Route::get('/paypal/cancel',[PaypalController::class,'cancel'])->name('paypal_cancel');


});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/clientes',Clientes::class)->middleware('can:admin')->name('clientes');
    Route::get('/provedores', Provedores::class)->middleware('can:admin')->name('provedores');
    Route::get('/estado-cuenta',EstadoCuenta::class)->middleware('can:admin')->name('estado-cuenta');
    Route::get('/pagos-pendientes',PagosAtrasados::class)->middleware('can:admin')->name('pagos-pendientes');
    Route::get('/cancelados',Cancelados::class)->middleware('can:admin')->name('cancelados');
    Route::get('/pendientes',Pendientes::class)->middleware('can:admin')->name('pendientes');
    Route::get('/reportes-admin',Reportes::class)->middleware('can:admin')->name('reportes-admin');
    Route::get('/reportes-admin',ReportesAdmin::class)->middleware('can:admin')->name('reportes-admin');
    Route::patch('/registarPago/{pagoId}', [PagoController::class, 'realizarPago'])->middleware('can:admin')->name('registarPago');
    Route::get('/busqueda-cliente',BusquedaCliente::class)->middleware('can:admin')->name('busqueda-cliente');
    Route::get('/agregarObj',AgregarObj::class)->middleware('can:admin')->name('agregarObj');


    Route::get('/agregar-cliente',AgregarCliente::class)->middleware('can:admin')->name('agregar-cliente');

    Route::delete('/eliminar-user/{userId}',[UserController::class, 'eliminar'])->middleware('can:admin')->name('eliminar.user');
    Route::patch('/resolver-reporte/{reporteId}',[ReporteController::class, 'resolverReporte'])->middleware('can:admin')->name('resolver.reporte');

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::post('/assignarCliente',[RealizarPago::class,'assignarCliente'])->middleware('can:cobrador')->name('assignarCliente');
    Route::post('/realizarPago',RealizarPago::class)->middleware('can:cobrador')->name('realizarPago');
    Route::get('/busquedaCliente',BusquedaCliente::class)->middleware('can:cobrador')->name('busquedaCliente');
    Route::post('/reportarPagos',[CajaController::class,'reportarPagos'])->middleware('can:cobrador')->name('reportarPagos');
    Route::post('/adelantarPagos',[CajaController::class,'adelantarPagos'])->middleware('can:cobrador')->name('adelantarPagos');
});