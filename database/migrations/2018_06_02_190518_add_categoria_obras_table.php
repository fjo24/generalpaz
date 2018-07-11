<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoriaObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_obras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('orden');
            $table->string('imagen');
            $table->timestamps();
        });
    }

    /**'nombre', 'orden', 'imagen',
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria_obras');
    }
}
