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
            $table->longText('about');
            $table->string('contact_phone');
            $table->string('contact_email');
            $table->string('contact_add');
            $table->string('facebook');
            $table->string('line');
            $table->string('instagram');
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
