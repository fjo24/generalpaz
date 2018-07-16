<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->text('descripcion');
            $table->string('orden');
            $table->integer('categoria_id')->unsigned();
            $table->integer('modelo_id')->unsigned()->nullable();
            $table->integer('tipovidrio_id')->unsigned()->nullable();
            $table->integer('ventaja_id')->unsigned()->nullable();

            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('modelo_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('modelo_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('modelo_id')->references('id')->on('modelos')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            
        });

        Schema::create('tipovidrio_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipovidrio_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('tipovidrio_id')->references('id')->on('tipovidrio')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            
        });

        Schema::create('ventaja_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ventaja_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('ventaja_id')->references('id')->on('ventajas')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            
        });
    }

    /**'nombre', 'descripcion', 'orden', 'categoria_id', 'modelo_id', 'tipovidrio_id', 'ventaja_id',
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
