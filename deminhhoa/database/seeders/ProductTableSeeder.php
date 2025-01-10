<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0;$i<20;$i++){
            DB::table('products')->insert([
                'store_id'=>$faker->numberBetween(1,5),
                'name'=>$faker->company(),
                'description'=>$faker->sentence(10),
                'price'=>$faker->randomFloat(10,100,4000),
            ]);
        }
    }
}
