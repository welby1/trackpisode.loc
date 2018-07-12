<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesgenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SeriesGenres', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('Serie_id');
            $table->foreign('Serie_id')->references('id')->on('Series');
            $table->unsignedInteger('Genre_id');
            $table->foreign('Genre_id')->references('id')->on('Genres');
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
        Schema::dropIfExists('SeriesGenres');
    }
}
