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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('codigo');
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('correo', 150)->unique();
            $table->string('telefono', 9);
            $table->string('rol', 20);
            $table->string('password');
            $table->unsignedBigInteger('id_acceso');

        $table->foreign('id_acceso')->references('codigo')->on('accesos');
            $table->timestamps();
        });
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
