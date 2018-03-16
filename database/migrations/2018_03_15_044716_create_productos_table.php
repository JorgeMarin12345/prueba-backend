<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sku');
            $table->longText('descripcion');
            $table->string('pais_origen');
            $table->string('fabricante');
            $table->integer('categoria_id');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('productos', function (Blueprint $table) {
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
