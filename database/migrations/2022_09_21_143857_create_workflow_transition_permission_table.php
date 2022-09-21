<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkflowTransitionPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workflow_transition_permission', function (Blueprint $table) {
            $table->id();
            $table->string('permission', 500);
            $table->unsignedBigInteger('workflow_trasitions_id');
            $table->foreign('workflow_trasitions_id')->references('id')->on('workflow_trasitions')->onDelete('cascade');
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
        Schema::dropIfExists('workflow_transition_permission');
    }
}
