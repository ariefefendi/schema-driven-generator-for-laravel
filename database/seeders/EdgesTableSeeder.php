<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EdgesTableSeeder extends Seeder
{
    public function run(): void
    {
        // =========================
        // EDGES
        // =========================
        DB::table('edges')->insert([
        // Cluster utama Ponorogo kota
        [
            'from_node_id' => 47477132,
            'to_node_id'   => 51767191,
            'distance'     => 3500,
            'geometry'     => json_encode([
                ['lat' => -7.6296141, 'lng' => 111.5397814],
                ['lat' => -7.634, 'lng' => 111.540], // contoh titik tengah
                ['lat' => -7.6388789, 'lng' => 111.5115657]
            ]),
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ],
    
        [
            'from_node_id' => 51767191,
            'to_node_id'   => 47484733,
            'distance'     => 4200,
            'geometry'     => json_encode([
                ['lat' => -7.6388789, 'lng' => 111.5115657],
                ['lat' => -7.680, 'lng' => 111.470],
                ['lat' => -7.9784515, 'lng' => 111.423856]
            ]),
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ],
    
        [
            'from_node_id' => 47484733,
            'to_node_id'   => 51767187,
            'distance'     => 7800,
            'geometry'     => json_encode([
                ['lat' => -7.9784515, 'lng' => 111.423856],
                ['lat' => -7.820, 'lng' => 111.340],
                ['lat' => -7.6678319, 'lng' => 111.2616376]
            ]),
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ],
    
        // Cluster selatan
        [
            'from_node_id' => 97027746,
            'to_node_id'   => 97027747,
            'distance'     => 600,
            'geometry'     => json_encode([
                ['lat' => -8.0545863, 'lng' => 111.711148],
                ['lat' => -8.0542328, 'lng' => 111.7045021]
            ]),
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ],
    
        [
            'from_node_id' => 97027747,
            'to_node_id'   => 97027750,
            'distance'     => 850,
            'geometry'     => json_encode([
                ['lat' => -8.0542328, 'lng' => 111.7045021],
                ['lat' => -8.0498673, 'lng' => 111.7078432]
            ]),
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ],
    
        // Penghubung antar cluster
        [
            'from_node_id' => 51767191,
            'to_node_id'   => 97027746,
            'distance'     => 15000,
            'geometry'     => json_encode([
                ['lat' => -7.6388789, 'lng' => 111.5115657],
                ['lat' => -7.850, 'lng' => 111.600],
                ['lat' => -8.0545863, 'lng' => 111.711148]
            ]),
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ],
    
        // Jalur alternatif
        [
            'from_node_id' => 47477132,
            'to_node_id'   => 47484733,
            'distance'     => 5000,
            'geometry'     => json_encode([
                ['lat' => -7.6296141, 'lng' => 111.5397814],
                ['lat' => -7.800, 'lng' => 111.480],
                ['lat' => -7.9784515, 'lng' => 111.423856]
            ]),
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]
    ]);
    }
}