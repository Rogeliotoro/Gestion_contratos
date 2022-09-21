<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('estado', 70);
            $table->string('objeto', 600);
            $table->string('condiciones', 320);
            $table->text('observaciones');
            $table->string('cod_cliente');
            $table->string('tipo');
            $table->string('firmante');
            $table->string('documentacion');
            $table->string('representacion');
            $table->string('importe');
            $table->string('forma_de_pago');
            $table->string('observaciones_adicionales');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('societies_id');
            $table->foreign('societies_id')->references('id')->on('societies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
