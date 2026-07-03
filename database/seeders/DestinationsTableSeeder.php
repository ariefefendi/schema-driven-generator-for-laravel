<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DestinationsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('destinations')->insert([
            [
                'node_id' => 4,
                'description' => 'Telaga wisata populer di Ponorogo dengan panorama alam.',
                'address' => 'Ngebel, Ponorogo',
                'photo' => 'telaga_ngebel.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'node_id' => 5,
                'description' => 'Wisata pegunungan dengan spot foto menarik.',
                'address' => 'Sampung, Ponorogo',
                'photo' => 'gunung_beruk.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}