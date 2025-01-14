<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ClubTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('vi_VN');
        for($i=0;$i<50;$i++){
            DB::table('clubs')->insert([
                'name'=>$faker->streetName(),
                'stadium'=>$faker->company(),
                'city'=>$faker->city(),
            ]);
        }
    }
}
