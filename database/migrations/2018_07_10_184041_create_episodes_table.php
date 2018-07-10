<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Episodes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',50);
            $table->date('airdate');
            $table->unsignedInteger('Season_id');
            $table->foreign('Season_id')->references('id')->on('Seasons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Episodes');
    }
}
