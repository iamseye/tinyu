<?php

use Illuminate\Database\Seeder;

class AgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ages')->insert([
            'range' => 'under 18',
        ]);
        DB::table('ages')->insert([
            'range' => '19~30',
        ]);
        DB::table('ages')->insert([
            'range' => '31~45',
        ]);
        DB::table('ages')->insert([
            'range' => 'above 45',
        ]);
    }
}

