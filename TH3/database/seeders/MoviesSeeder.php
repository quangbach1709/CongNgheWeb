<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $movies = [];
        for ($i = 0; $i < 10; $i++) {
            $movies[] = [
                'title' => $faker->sentence(3),
                'director' => $faker->name,
                'release_date' => $faker->date,
                'duration' => $faker->numberBetween(90, 180),
                'cinema_id' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('movies')->insert($movies);
    }
}
