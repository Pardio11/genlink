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
        Schema::create('instalaciones', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_limite'); // Agregar campo fecha_limite de tipo date
            $table->text('nota')->nullable(); // Agregar campo nota de tipo texto y permitir valores nulos
            $table->boolean('realizado')->default(false); // Agregar campo realizado de tipo boolean con valor por defecto false
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instalaciones');
    }
};
