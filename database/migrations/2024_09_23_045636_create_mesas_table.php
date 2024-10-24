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
        Schema::create('mesas', function (Blueprint $table) {
            $table->id('codigo'); // Dejar que Laravel maneje el ID automáticamente
            $table->string('numero')->unique(); // Número de mesa debe ser único
            $table->integer('capacidad')->min(1); // Capacidad debe ser un entero, se puede agregar validación en el controlador
            $table->string('estado')->default('Disponible'); // Estado por defecto
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mesas');
    }
};
