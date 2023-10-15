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
        Schema::create('descuentos', function (Blueprint $table) {
            $table->id();
            $table->string('mes_inicio');
            $table->string('meses_vigente');
            // Llave foránea a la tabla "T_descuento"
            $table->foreignId('tipo_descuento_id')->constrained('tipo_descuentos');
            $table->foreignId('contrato_id')->constrained('contratos');
            // Agrega otros campos según tus requerimientos

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('descuentos');
    }
};
