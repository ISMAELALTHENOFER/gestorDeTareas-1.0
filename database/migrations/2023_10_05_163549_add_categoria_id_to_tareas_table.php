<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoriaIdToTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tareas', function (Blueprint $table) { //se modifica la tabla tareas
            $table->unsignedBigInteger('categoria_id')->nullable(); // se agrega una nueva columna
            $table->foreign('categoria_id')->references('id')->on('categorias')->after('titulo');
            //se crea una clave foránea. hace referencia a la columna 'id' en la tabla 'categorias' despues de titulo
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tareas', function (Blueprint $table) {
            //
        });
    }
}
