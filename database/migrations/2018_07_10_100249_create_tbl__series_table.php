<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_Series', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',50);
            $table->mediumText('summary')->nullable();
            $table->year('releaseYear');
            $table->binary('posterPath')->nullable();  /* mysql blob type*/
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
        Schema::dropIfExists('tbl_Series');
    }
}
