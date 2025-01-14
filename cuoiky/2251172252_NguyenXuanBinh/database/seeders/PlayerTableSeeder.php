<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PlayerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('vi_VN');
        for($i=0;$i<50;$i++){
            DB::table('players')->insert([
                'club_id'=>$faker->numberBetween(1, 50),
                'name'=>$faker->name(),
                'position'=>$faker->randomElement(['Hậu vệ', 'Tiền vệ', 'Thủ môn', 'Tiền đạo']),
                'number'=>$faker->numberBetween(40, 100),
                'birthday'=>$faker->date(),
            ]);
        }
    }
}
