<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Users;

class DefaultUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->firstOrFail();
        $operatorRole = Role::where('name', 'operator')->firstOrFail();
        $driverRole = Role::where('name', 'driver')->firstOrFail();

        // Admin
        Users::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => $adminRole->id,
        ]);

        // Operator
        Users::create([
            'name' => 'Operator',
            'email' => 'operator@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => $operatorRole->id,
        ]);

        // Driver
        Users::create([
            'name' => 'Driver User',
            'email' => 'driver@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => $driverRole->id,
        ]);
    }
}
