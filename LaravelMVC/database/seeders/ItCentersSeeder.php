<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ItCentersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $itCenters = [];
        for ($i = 0; $i < 10; $i++) {
            $itCenters[] = [
                'name' => $faker->company,
                'location' => $faker->address,
                'contact_email' => $faker->unique()->email,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('it_centers')->insert($itCenters);
    }
}
