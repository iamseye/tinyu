<?php

use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            'name' => '中區',
        ]);
        DB::table('locations')->insert([
            'name' => '東區',
        ]);
        DB::table('locations')->insert([
            'name' => '南區',
        ]);
        DB::table('locations')->insert([
            'name' => '西區',
        ]);
        DB::table('locations')->insert([
            'name' => '北區',
        ]);
        DB::table('locations')->insert([
            'name' => '北屯區',
        ]);
        DB::table('locations')->insert([
            'name' => '西屯區',
        ]);
        DB::table('locations')->insert([
            'name' => '南屯區',
        ]);
        DB::table('locations')->insert([
            'name' => '太平區',
        ]);
        DB::table('locations')->insert([
            'name' => '大里區',
        ]);
        DB::table('locations')->insert([
            'name' => '霧峰區',
        ]);
        DB::table('locations')->insert([
            'name' => '烏日區',
        ]);
        DB::table('locations')->insert([
            'name' => '豐原區',
        ]);
        DB::table('locations')->insert([
            'name' => '后里區',
        ]);
        DB::table('locations')->insert([
            'name' => '石岡區',
        ]);
        DB::table('locations')->insert([
            'name' => '東勢區',
        ]);
        DB::table('locations')->insert([
            'name' => '和平區',
        ]);
        DB::table('locations')->insert([
            'name' => '新社區',
        ]);
        DB::table('locations')->insert([
            'name' => '潭子區',
        ]);
        DB::table('locations')->insert([
            'name' => '大雅區',
        ]);
        DB::table('locations')->insert([
            'name' => '神岡區',
        ]);
        DB::table('locations')->insert([
            'name' => '大肚區',
        ]);
        DB::table('locations')->insert([
            'name' => '沙鹿區',
        ]);
        DB::table('locations')->insert([
            'name' => '龍井區',
        ]);
        DB::table('locations')->insert([
            'name' => '梧棲區',
        ]);
        DB::table('locations')->insert([
            'name' => '清水區',
        ]);
        DB::table('locations')->insert([
            'name' => '大甲區',
        ]);
        DB::table('locations')->insert([
            'name' => '外埔區',
        ]);
        DB::table('locations')->insert([
            'name' => '大安區',
        ]);

    }
}
