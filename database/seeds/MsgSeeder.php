<?php

use Illuminate\Database\Seeder;

class MsgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            'name' => 'TCTimeWald',
            'phone' => '0962-334-333',
            'email' => 'str_random(10).\'@gmail.com\'',
            'title' => str_random(10),
            'content' => 'Windows talking painted pasture yet its express parties use. Sure last upon he same as knew next. Of believed or diverted no rejoiced. End friendship sufficient assistance can prosperous met. As game he show it park do. Was has unknown few certain ten promise. No finished my an likewise cheerful packages we. For assurance concluded son something depending discourse see led collected. Packages oh no denoting my advanced humoured. Pressed be so thought natural. ',
            'status' => 0,
        ]);

        DB::table('messages')->insert([
            'name' => 'TCTimeWald',
            'phone' => '0962-334-333',
            'email' => 'str_random(10).\'@gmail.com\'',
            'title' => str_random(10),
            'content' => 'Windows talking painted pasture yet its express parties use. Sure last upon he same as knew next. Of believed or diverted no rejoiced. End friendship sufficient assistance can prosperous met. As game he show it park do. Was has unknown few certain ten promise. No finished my an likewise cheerful packages we. For assurance concluded son something depending discourse see led collected. Packages oh no denoting my advanced humoured. Pressed be so thought natural. ',
            'status' => 0,
        ]);


    }
}
