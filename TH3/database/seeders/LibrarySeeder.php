<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class LibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $libraries = [];
        for ($i = 0; $i < 10; $i++) {
            $libraries[] = [
                'name' => $faker->company,
                'address' => $faker->address,
                'contact_number' => $faker->phoneNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('libraries')->insert($libraries);
    }
}
