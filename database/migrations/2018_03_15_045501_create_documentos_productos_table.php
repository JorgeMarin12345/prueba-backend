<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('producto_id');
            $table->boolean('imagen');
            $table->string('ruta');
            $table->timestamps();
        });

        Schema::table('documentos_productos', function (Blueprint $table) {
            $table->foreign('producto_id')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos_productos');
    }
}
