<?php

use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookings')->insert([
            'name' => 'TCTimeWald',
            'phone' => '0962-334-333',
            'email' => 'str_random(10).\'@gmail.com\'',
            'tours_id' => 1,
            'nationality' => 'US',
            'age_id' => 2,
        ]);

        DB::table('bookings')->insert([
            'name' => 'testsef2222',
            'phone' => '0962-334-333',
            'email' => 'str_random(10).\'@gmail.com\'',
            'tours_id' => 2,
            'nationality' => 'US',
            'age_id' => 2,
        ]);
    }
}
