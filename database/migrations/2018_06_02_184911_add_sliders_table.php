<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imagen', 300);
            $table->string('texto', 300)->nullable();
            $table->string('texto2', 300)->nullable();
            $table->string('link', 300)->nullable();
            $table->string('orden', 10);
            $table->enum('seccion', ['home', 'servicios', 'empresa', 'presupuesto']);
            $table->timestamps();
        });
    }

    /**'imagen', 'texto', 'texto2', 'link', 'orden', 'seccion',
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
