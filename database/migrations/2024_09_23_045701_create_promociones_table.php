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
        Schema::create('promociones', function (Blueprint $table) {
            $table->id('codigo');
            $table->string('nombre', 50);
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('id_plato');
            $table->decimal('descuento', 5, 2);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('estado')->default('confirmada');

        $table->foreign('id_plato')->references('codigo')->on('platos');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promociones');
    }
};
