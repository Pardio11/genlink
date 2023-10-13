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
            $table->foreignId('contrato_id')->constrained('contratos')->nullable();
            $table->foreignId('tipo_servicio_id')->constrained('tipo_servicios')->nullable();
            $table->foreignId('recargo_id')->constrained('recargos')->nullable();
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
