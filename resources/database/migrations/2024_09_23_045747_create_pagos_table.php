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
            $table->id('codigo');
            $table->unsignedBigInteger('id_pedido');
            $table->decimal('monto', 8, 2);
            $table->string('metodo');
            $table->dateTime('fecha');
            $table->string('estado')->default('pendiente');

        $table->foreign('id_pedido')->references('codigo')->on('pedidos');
       
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
