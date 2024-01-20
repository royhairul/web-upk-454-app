<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class AdminUPKSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin1 = User::create([
                'nim' => '12121212',
                'username' => 'Admin 1',
                'password' => '12345'
        ]);
        $admin1->assignRole('admin_upk');
        
        $admin2 = User::create([
            'nim' => '1212113132',
            'username' => 'Admin 2',
            'password' => '12345',
        ]);
        $admin2->assignRole('admin_upk');
    }
}
