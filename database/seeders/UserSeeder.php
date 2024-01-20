<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list_users = [
            [
                'username' => 'Roy Hairul Anam',
                'nim' => '362258302016',
                'password' => '12345'
            ],
            [
                'username' => 'Sandi Sukoco Putro',
                'nim' => '362258302037',
                'password' => '12345',
            ]
        ];

        User::insert($list_users);
    }
}
