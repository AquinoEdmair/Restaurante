<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('imagen');   
            $table->tinyInteger('activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_categorias', function (Blueprint $table) {
            //
        });
    }
}
