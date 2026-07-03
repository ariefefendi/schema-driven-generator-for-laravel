<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CalculationLogsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('calculation_logs')->insert([
            [
                'start_node_id' => 1,
                'end_node_id' => 4,
                'total_distance' => 21000,
                'execution_time' => 0.0021,
                'total_nodes_processed' => 5,
                'created_at' => Carbon::now()
            ],
            [
                'start_node_id' => 1,
                'end_node_id' => 5,
                'total_distance' => 12500,
                'execution_time' => 0.0018,
                'total_nodes_processed' => 4,
                'created_at' => Carbon::now()
            ]
        ]);
    }
}