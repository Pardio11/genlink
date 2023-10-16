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
            $table->string('n_id')->unique();
            $table->string('direccion');
            $table->string('telefono');
            $table->foreignId('instalacion_id')->nullable()->constrained('instalacions')->cascadeOnDelete();
            $table->foreignId('contrato_id')->nullable()->constrained('contratos')->cascadeOnDelete();
            $table->foreignId('antena_id')->nullable()->constrained('antenas')->cascadeOnDelete();
            $table->foreignId('router_id')->nullable()->constrained('routers')->cascadeOnDelete();
            $table->foreignId('zona_id')->nullable()->constrained('zonas')->cascadeOnDelete();
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
