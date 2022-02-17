<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('contenido');
            $table->unsignedBigInteger('user_id_creado');
            $table->unsignedBigInteger('user_id_reparado')->nullable();
            $table->string('estado')->default('pendiente');
            $table->timestamps();
        });

        Schema::table('incidencias',function(Blueprint $table){
            $table->foreign('user_id_creado')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidencias');
    }
};
