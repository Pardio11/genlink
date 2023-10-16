<?php

use App\Http\Controllers\InstalacionController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PaypalController;
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
    Route::get('/realizarPago/{clienteId}', [PagoController::class, 'realizarPago']);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/clientes',Clientes::class)->name('clientes');
    Route::get('/estado-cuenta',EstadoCuenta::class)->name('estado-cuenta');
    Route::get('/pagos-pendientes',PagosAtrasados::class)->name('pagos-pendientes');
    Route::get('/cancelados',Cancelados::class)->name('cancelados');
    Route::get('/pendientes',Pendientes::class)->name('pendientes');
    Route::get('/reportes-admin',Reportes::class)->name('reportes-admin');
    Route::get('/reportes-admin',ReportesAdmin::class)->name('reportes-admin');
    Route::get('/registarPago/{clienteId}', [PagoController::class, 'realizarPago']);
    Route::get('/realizar-pago',RealizarPago::class)->name('realizar-pago');
    Route::get('/busqueda-cliente',BusquedaCliente::class)->name('busqueda-cliente');
    Route::get('/agregarObj',AgregarObj::class)->middleware('can:admin')->name('agregarObj');


    Route::get('/agregar-cliente',AgregarCliente::class)->name('agregar-cliente');

    Route::delete('/eliminar-user/{userId}',[UserController::class, 'eliminar'])->middleware('can:admin')->name('eliminar.user');

    

    Route::post('/paypal/payment',[PaypalController::class,'payment'])->name('paypal');
    Route::get('/paypal/success',[PaypalController::class,'success'])->name('paypal_success');
    Route::get('/paypal/cancel',[PaypalController::class,'cancel'])->name('paypal_cancel');


});