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
        Schema::create('menus', function (Blueprint $table) {
            $table->id('codigo');
            $table->string('nombre', 50);
            $table->unsignedBigInteger('id_plato');
            $table->unsignedBigInteger('id_categoria');


        $table->foreign('id_plato')->references('codigo')->on('platos');

        $table->foreign('id_categoria')->references('codigo')->on('categorias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
