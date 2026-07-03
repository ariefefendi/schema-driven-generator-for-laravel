<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BusScheduleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('bus_schedules')->insert([
            [
                'bus_id' => 'BUS001',
                'driver_id' => 'DRV001',
                'start_node_id' => 'ND001',
                'end_node_id' => 'ND010',
                'total_distance' => '120',
                'estimated_duration' => '02:30',
                'departure_day' => 'Monday',
                'departure_time' => '08:00',
                'expected_arrival_time' => '10:30',
                'actual_departure_time' => '08:02',
                'actual_arrival_time' => '10:35',
                'status' => 'completed',
                'notes' => 'Perjalanan pagi, sedikit terlambat tiba',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'bus_id' => 'BUS002',
                'driver_id' => 'DRV002',
                'start_node_id' => 'ND002',
                'end_node_id' => 'ND011',
                'total_distance' => '200',
                'estimated_duration' => '04:00',
                'departure_day' => 'Tuesday',
                'departure_time' => '09:00',
                'expected_arrival_time' => '13:00',
                'actual_departure_time' => '09:05',
                'actual_arrival_time' => '13:20',
                'status' => 'completed',
                'notes' => 'Macet di tengah perjalanan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'bus_id' => 'BUS003',
                'driver_id' => 'DRV003',
                'start_node_id' => 'ND003',
                'end_node_id' => 'ND012',
                'total_distance' => '80',
                'estimated_duration' => '01:45',
                'departure_day' => 'Wednesday',
                'departure_time' => '07:30',
                'expected_arrival_time' => '09:15',
                'actual_departure_time' => '07:30',
                'actual_arrival_time' => '09:10',
                'status' => 'completed',
                'notes' => 'Tiba lebih cepat',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'bus_id' => 'BUS004',
                'driver_id' => 'DRV004',
                'start_node_id' => 'ND004',
                'end_node_id' => 'ND013',
                'total_distance' => '150',
                'estimated_duration' => '03:00',
                'departure_day' => 'Thursday',
                'departure_time' => '14:00',
                'expected_arrival_time' => '17:00',
                'actual_departure_time' => '14:10',
                'actual_arrival_time' => '17:05',
                'status' => 'completed',
                'notes' => 'Sempat delay karena pengecekan kendaraan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}