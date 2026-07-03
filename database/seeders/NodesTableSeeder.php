<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NodesTableSeeder extends Seeder
{
    public function run(): void
    {
        // =========================
        // NODES
        // =========================
        DB::table('nodes')->insert([
        // Cluster Ponorogo Kota
        [
            'id' => 47477132,
            'name' => 'Jalan Brigadir Jenderal Slamet Riyadi',
            'city' => 'ponorogo',
            'latitude' => -7.6296141,
            'longitude' => 111.5397814,
            'type' => 'secondary',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'id' => 47484733,
            'name' => 'Jalan Pisang',
            'city' => 'ponorogo',
            'latitude' => -7.9784515,
            'longitude' => 111.423856,
            'type' => 'tertiary',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'id' => 51767187,
            'name' => 'Jalan Raya Magetan - Sarangan',
            'city' => 'ponorogo',
            'latitude' => -7.6678319,
            'longitude' => 111.2616376,
            'type' => 'primary',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'id' => 51767191,
            'name' => 'Jalan Hayam Wuruk',
            'city' => 'ponorogo',
            'latitude' => -7.6388789,
            'longitude' => 111.5115657,
            'type' => 'secondary',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        // Cluster Selatan
        [
            'id' => 97027746,
            'name' => 'Jalan R.A. Kartini',
            'city' => 'ponorogo',
            'latitude' => -8.0545863,
            'longitude' => 111.711148,
            'type' => 'tertiary',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'id' => 97027747,
            'name' => 'Jalan Veteran',
            'city' => 'ponorogo',
            'latitude' => -8.0542328,
            'longitude' => 111.7045021,
            'type' => 'tertiary',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'id' => 97027750,
            'name' => 'Jalan K.H. Wahid Hasyim',
            'city' => 'ponorogo',
            'latitude' => -8.0498673,
            'longitude' => 111.7078432,
            'type' => 'residential',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]
    ]);
    }
}