<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('estado');
            $table->string('objeto');
            $table->string('condiciones');
            $table->string('observaciones');
            $table->string('importe');
            $table->string('forma_de_pago');
            $table->string('observaciones_adicionales');
            $table->string('tipo');
            $table->string('firmante');
            $table->string('documentacion');
            $table->string('representacion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->text('comentarios');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('societies_id');
            $table->foreign('societies_id')->references('id')->on('societies')->onDelete('cascade');
            $table->unsignedBigInteger('files_id');
            $table->foreign('files_id')->references('id')->on('files')->onDelete('cascade');
            $table->unsignedBigInteger('cecos_id');
            $table->foreign('cecos_id')->references('id')->on('cecos')->onDelete('cascade');
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
        Schema::dropIfExists('solicitudes');
    }
}
