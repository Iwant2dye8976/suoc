<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = Faker::create('vi_VN'); Tiengviet
        $faker = Faker::create();
        for($i=0;$i<50;$i++){
            DB::table('students')->insert([
                'first_name'=>$faker->firstName(),
                'last_name'=>$faker->lastName(),
                'email'=>$faker->safeEmail(),
                'student_number'=>$faker->numberBetween(1,100),
                'class_id'=>$faker->numberBetween(1,50),
                'status'=>$faker->randomElement(['Trial', 'Enrolled', 'Dropped']),
                'date_of_birth'=>$faker->date(),
            ]);
        }
    }
}