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
        Schema::create('antenas', function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->string('mac');
            $table->string('user');
            $table->string('password');
            $table->foreignId('modelo_antena_id')->constrained('modelo_antenas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antenas');
    }
};
