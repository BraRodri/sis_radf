<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('document')->unique();
            $table->string('names');
            $table->string('grado');
            $table->string('distintivo');
            $table->string('arma');
            $table->string('brigada');
            $table->string('email')->unique();
            $table->string('email_corporativo');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('estado');
            $table->integer('rol')->default(0);
            $table->rememberToken();

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
        Schema::dropIfExists('users');
    }
}
