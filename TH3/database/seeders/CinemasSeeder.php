<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CinemasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $cinemas = [];
        for ($i = 0; $i < 10; $i++) {
            $cinemas[] = [
                'name' => $faker->company,
                'location' => $faker->address,
                'total_seats' => $faker->numberBetween(50, 300),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('cinemas')->insert($cinemas);
    }
}
