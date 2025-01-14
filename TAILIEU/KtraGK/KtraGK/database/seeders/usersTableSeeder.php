<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('user')->insert([
                'email' => $faker->email,
                'password' => $faker->password,
                'login_time' => $faker->dateTime,
                'login_status' => $faker->randomElement(['success', 'failure']),
                'user_role' => $faker->randomElement(['admin', 'user', 'guest']),
            ]);
        }
    }
}
