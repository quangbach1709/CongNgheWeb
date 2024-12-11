<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class LaptopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $laptops = [];
        for ($i = 0; $i < 10; $i++) {
            $laptops[] = [
                'brand' => $faker->company,
                'model' => $faker->word,
                'specifications' => $faker->sentence(3),
                'rental_status' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('laptops')->insert($laptops);
    }
}
