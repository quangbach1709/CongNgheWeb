<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class HardwareDevicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $hardwareDevices = [];
        for ($i = 0; $i < 10; $i++) {
            $hardwareDevices[] = [
                'device_name' => $faker->word,
                'type' => $faker->word,
                'status' => $faker->boolean,
                'center_id' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('hardware_devices')->insert($hardwareDevices);
    }
}
