<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longtext('description');
            $table->string('meeting_point');
            $table->integer('peopleNum');
            $table->string('picture');

            $table->string('tour_type'); //free or charged
            //--charged column---
            $table->integer('price');
            $table->integer('early_price');
            //--end charged column---
            $table->string('schedule_type'); // regularly or once
            $table->dateTime('tour_start_time');
            $table->dateTime('tour_end_time');
            $table->integer('offShelf');

            $table->integer('regular_tour_id'); //foreign key
            $table->integer('location_id'); //foreign key
            $table->integer('booking_id'); //foreign key

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
        Schema::drop('tours');

    }
}
