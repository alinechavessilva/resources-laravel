<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlowResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flow_resources', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type_flow');

            $table->integer('resource_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->integer('quantity');

            $table->timestamps();

            $table->foreign('resource_id')
                  ->references('id')
                  ->on('resources')
                  ->onDelete('cascade');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flow_resources');
    }
}
