<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class RenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $renters = [];
        for ($i = 0; $i < 10; $i++) {
            $renters[] = [
                'name' => $faker->name,
                'phone_number' => $faker->phoneNumber,
                'email' => $faker->unique()->email,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        DB::table('renters')->insert($renters);
    }
}
