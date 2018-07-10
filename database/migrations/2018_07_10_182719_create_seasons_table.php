<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Seasons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('seasonNumber',3);
            $table->unsignedInteger('Serie_id');
            $table->foreign('Serie_id')->references('id')->on('Series');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Seasons');
    }
}
