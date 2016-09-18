<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegularToursTable extends Migration
{
    public function up()
    {
        Schema::create('regular_tours', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_id');
            $table->string('title');
            $table->string('week');
            $table->date('tour_start_date');
            $table->date('tour_end_date');
            $table->rememberToken();
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
        //
        Schema::drop('regular_tours');

    }
}
