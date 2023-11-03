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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_pagado')->nullable();
            $table->date('fecha_limite');
            $table->foreignId('cliente_id')->constrained('clientes')->cascadeOnDelete();;
            $table->foreignId('tipo_servicio_id')->constrained('tipo_servicios');
            $table->foreignId('recargo_id')->nullable()->constrained('recargos');
            $table->foreignId('caja_id')->nullable()->constrained('cajas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
