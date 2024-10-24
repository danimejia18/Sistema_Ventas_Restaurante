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
    Schema::create('pedidos', function (Blueprint $table) {
        $table->id('codigo');
        $table->unsignedBigInteger('id_cliente');
        $table->unsignedBigInteger('id_empleado');
        $table->dateTime('fecha');
        $table->decimal('total', 8, 2);
        $table->string('estado')->default('pendiente');

        $table->foreign('id_cliente')->references('codigo')->on('clientes');
        $table->foreign('id_empleado')->references('codigo')->on('empleados');
            
        $table->timestamps();
        
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
