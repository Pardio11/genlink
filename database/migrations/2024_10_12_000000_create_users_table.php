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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('n_id')->unique();
            $table->longText('image_data')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('direccion');
            $table->string('telefono');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('instalacion_id')->nullable()->constrained('instalacions');
            $table->foreignId('contrato_id')->nullable()->constrained('contratos');
            $table->foreignId('antena_id')->nullable()->constrained('antenas');
            $table->foreignId('router_id')->nullable()->constrained('routers');
            $table->foreignId('zona_id')->nullable()->constrained('zonas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
