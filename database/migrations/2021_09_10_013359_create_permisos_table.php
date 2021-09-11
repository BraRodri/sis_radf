<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->id();

            $table->string('n_boleta');
            $table->string('batallon');
            $table->string('user_id')->nullable();
            $table->string('nombre_soldado')->nullable();
            $table->string('cedula_soldado')->nullable();
            $table->string('telefono_soldado')->nullable();
            $table->dateTime('fecha_salida');
            $table->dateTime('fecha_entrada');
            $table->string('guarnicion')->nullable();
            $table->string('destino')->nullable();
            $table->string('motivo')->nullable();
            $table->text('pdf')->nullable();

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
        Schema::dropIfExists('permisos');
    }
}
