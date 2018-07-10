<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersepisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UsersEpisodes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('User_id');
            $table->foreign('User_id')->references('id')->on('users');
            $table->unsignedInteger('Episode_id');
            $table->foreign('Episode_id')->references('id')->on('Episodes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('UsersEpisodes');
    }
}
