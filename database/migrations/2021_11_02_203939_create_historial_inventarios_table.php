<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_inventario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventario_id')->nullable()->constrained('inventario');
            $table->integer('cantidad_agregada');
            $table->integer('cantidad_eliminada');
            $table->integer('stock_registrado');
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
        Schema::dropIfExists('historial_inventario');
    }
}
