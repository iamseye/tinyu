<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOverviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('overviews', function (Blueprint $table) {
            $table->increments('id');
            $table->string('website_title');
            $table->string('keyword');
            $table->text('description');
            $table->string('logo');
            $table->string('favicon');
            $table->string('video_path');
            $table->string('video_title');
            $table->text('video_content');
            $table->longText('about');
            $table->longText('about_team_intro');
            $table->string('contact_phone');
            $table->string('contact_email');
            $table->string('contact_add');
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
        Schema::drop('overviews');

    }
}
