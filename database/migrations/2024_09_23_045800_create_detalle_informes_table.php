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
        Schema::create('detalle_informes', function (Blueprint $table) {
            $table->id('codigo');
            $table->unsignedBigInteger('id_informe');
            $table->unsignedBigInteger('id_pedido');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_empleado');
            $table->unsignedBigInteger('id_pago');
            $table->unsignedBigInteger('id_reservacion');
            $table->unsignedBigInteger('id_mesa');
            $table->unsignedBigInteger('id_promocion');
        
            $table->foreign('id_informe')->references('codigo')->on('informes');
            $table->foreign('id_pedido')->references('codigo')->on('pedidos');
            $table->foreign('id_cliente')->references('codigo')->on('clientes');
            $table->foreign('id_empleado')->references('codigo')->on('empleados');
            $table->foreign('id_pago')->references('codigo')->on('pagos');
            $table->foreign('id_reservacion')->references('codigo')->on('reservaciones');
            $table->foreign('id_mesa')->references('codigo')->on('mesas');
            $table->foreign('id_promocion')->references('codigo')->on('promociones');
            $table->timestamps();

        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_informes');
    }
};
