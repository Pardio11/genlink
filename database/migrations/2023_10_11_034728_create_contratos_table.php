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
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->date('f_instalacion');
            $table->integer('dia_corte');
            $table->integer('velocidad');
            $table->decimal('precio', 10, 2); // Usamos el tipo decimal para el precio con 2 decimales
            $table->timestamps();

            // Definir las relaciones de llave foránea con opciones para valores nulos
            $table->foreignId('descuento_id')->constrained('descuentos')->nullable();
            $table->foreignId('recargo_id')->constrained('recargos')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};
