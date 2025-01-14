<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0;$i<5;$i++){
            DB::table('stores')->insert([
                'name'=>$faker->city(),
                'address'=>$faker->address(),
                'phone'=>$faker->phoneNumber(),
            ]);
        }
    }
}
