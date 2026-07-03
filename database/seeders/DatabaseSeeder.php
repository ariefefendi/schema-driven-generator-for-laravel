<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // BusScheduleSeeder::class,
            BusSeeder::class,
            // RolesTableSeeder::class,
            // DefaultUsersSeeder::class,
            // DestinationsTableSeeder::class,
            // NodesTableSeeder::class,
            // EdgesTableSeeder::class,
            // CalculationLogsTableSeeder::class,
            
        ]);
    }
}
