<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informes', function (Blueprint $table) {
            $table->id('codigo'); // Crea un campo 'id' autoincremental
            $table->string('titulo'); // Crea un campo 'titulo' de tipo string
            $table->text('descripcion'); // Crea un campo 'contenido' de tipo text
            $table->timestamp('fecha_creacion')->useCurrent(); // Crea un campo 'fecha_creacion' con la fecha y hora actual
            $table->string('estado')->default('pendiente');
            $table->timestamps(); // Crea los campos 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informes'); // Elimina la tabla 'informes' si existe
    }
}
