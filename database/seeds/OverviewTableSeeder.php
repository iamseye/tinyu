<?php

use Illuminate\Database\Seeder;

class OverviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('overviews')->insert([
            'website_title' => 'TCTimeWald',
            'keyword' => '台中,台中漫步,台中導覽,導覽',
            'description' => 'Windows talking painted pasture yet its express parties use. Sure last upon he same as knew next. Of believed or diverted no rejoiced. End friendship sufficient assistance can prosperous met. As game he show it park do. Was has unknown few certain ten promise. No finished my an likewise cheerful packages we. For assurance concluded son something depending discourse see led collected. Packages oh no denoting my advanced humoured. Pressed be so thought natural. ',
            'logo' => str_random(10),
            'favicon' => str_random(10),
            'video_path' => str_random(10),
            'video_title' => str_random(10),
            'video_content' => str_random(10),
            'about' => 'Windows talking painted pasture yet its express parties use. Sure last upon he same as knew next. Of believed or diverted no rejoiced. End friendship sufficient assistance can prosperous met. As game he show it park do. Was has unknown few certain ten promise. No finished my an likewise cheerful packages we. For assurance concluded son something depending discourse see led collected. Packages oh no denoting my advanced humoured. Pressed be so thought natural. ',
            'about_team_intro' => 'Windows talking painted pasture yet its express parties use. Sure last upon he same as knew next. Of believed or diverted no rejoiced. End friendship sufficient assistance can prosperous met. As game he show it park do. Was has unknown few certain ten promise. No finished my an likewise cheerful packages we. For assurance concluded son something depending discourse see led collected. Packages oh no denoting my advanced humoured. Pressed be so thought natural. ',
            'contact_phone' => '988595883039384',
            'contact_email' => str_random(10).'@gmail.com',
            'contact_add' => str_random(10),

        ]);
    }
}
