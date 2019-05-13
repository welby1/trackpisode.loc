<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('Serie_id');
            $table->foreign('Serie_id')->references('id')->on('Series');
            $table->unsignedInteger('User_id');
            $table->foreign('User_id')->references('id')->on('users');
            $table->unsignedInteger('vote');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Ratings');
    }
}
