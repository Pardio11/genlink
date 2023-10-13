<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('n_id');
            $table->longText('image_data')->nullable();
            $table->string('direccion');
            $table->string('telefono');
            $table->string('correo');
            $table->string('password');
            $table->foreignId('pago_id')->constrained('pagos');
            $table->foreignId('contrato_id')->constrained('contratos');
            $table->foreignId('antena_id')->constrained('antenas');
            $table->foreignId('router_id')->constrained('routers');
            $table->foreignId('zona_id')->constrained('zonas');
            $table->foreignId('reporte_id')->constrained('reportes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
