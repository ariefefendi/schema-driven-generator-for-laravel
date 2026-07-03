<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Role::create([
                    'name' => 'admin',
                    'description' => 'Administrator',
                ]);
        
                Role::create([
                    'name' => 'operator',
                    'description' => 'Operator',
                ]);
        
                Role::create([
                    'name' => 'driver',
                    'description' => 'Driver',
                ]);
        
                Role::create([
                    'name' => 'user',
                    'description' => 'User',
                ]);
    }
}
