<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BusSeeder extends Seeder
{
    public function run()
    {
        DB::table('buses')->insert([
            [
                'bus_code' => 'BUS-001',
                'plate_number' => 'AE1234XZ',
                'capacity' => 40,
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'bus_code' => 'BUS-002',
                'plate_number' => 'AE2345YZ',
                'capacity' => 35,
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'bus_code' => 'BUS-003',
                'plate_number' => 'AE3456AB',
                'capacity' => 30,
                'status' => 'maintenance',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'bus_code' => 'BUS-004',
                'plate_number' => 'AE4567CD',
                'capacity' => 45,
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'bus_code' => 'BUS-005',
                'plate_number' => 'AE5678EF',
                'capacity' => 25,
                'status' => 'inactive',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}