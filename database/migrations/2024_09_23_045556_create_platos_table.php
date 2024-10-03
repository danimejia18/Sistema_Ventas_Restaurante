<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('platos', function (Blueprint $table) {
            $table->id('codigo');
            $table->string('nombre', 100);
            $table->decimal('precio', 8, 2);
            $table->text('ingredientes');
            $table->unsignedBigInteger('id_categoria');

            $table->foreign('id_categoria')->references('codigo')->on('categorias');
           $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('platos');
    }
};
