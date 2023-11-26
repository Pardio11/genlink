<?php

use App\Http\Controllers\API\ContratoAPIController;
use App\Http\Controllers\API\InstalacionAPIController;
use App\Http\Controllers\API\LoginAPIController;
use App\Http\Controllers\API\PagoAPIController;
use App\Http\Controllers\API\PaypalAPIController;
use App\Http\Controllers\API\RecargoAPIController;
use App\Http\Controllers\API\ReporteAPIController;
use App\Http\Controllers\API\UserAPIController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('login',[LoginAPIController::class,'login']);
Route::post('/registerUser',[UserAPIController::class,'registerUser']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware([
    'role',
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/contrato',[ContratoAPIController::class,'getContrato']);
    Route::get('/asignarInstalacion',[InstalacionAPIController::class,'asignarInstalacion']);
    Route::get('/instalacion',[InstalacionAPIController::class,'getInstalacion']);
    Route::get('/user',[UserAPIController::class,'getUser']);  
    Route::get('/pagos',[PagoAPIController::class,'getPagos']);
    Route::get('/recargo/{id}',[RecargoAPIController::class,'getRecargo']);   
    Route::post('/paypal/paymentAPI',[PaypalAPIController::class,'payment']);
    Route::get('/paypal/successAPI/{clienteId}',[PaypalAPIController::class,'success'])->name('successAPI');
    Route::get('/paypal/cancelAPI',[PaypalAPIController::class,'cancel'])->name('cancelAPI');
    Route::post('/agregarReporte',[ReporteAPIController::class,'agregarReporte']);
    Route::get('/reportes',[ReporteAPIController::class,'getReportes']);
});
