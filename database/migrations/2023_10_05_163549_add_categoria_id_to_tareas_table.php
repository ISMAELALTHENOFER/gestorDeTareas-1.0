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
            $table->bigInteger('category_id')->unsigned(); // se agrega una nueva columna
            $table
                ->foreign('category_id') //se crea una clave foránea. 
                ->references('id')      // hace referencia a la columna 'id' en la tabla 'categorias'.
                ->on('categorias')->after('titulo');
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
