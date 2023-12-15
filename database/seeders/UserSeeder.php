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
                'name' => 'Roy Hairul Anam',
                'email' => 'royhairul@gmail.com',
                'password' => '12345'
            ],
            [
                'name' => 'Sandi Sukoco Putro',
                'email' => 'sandisp@gmail.com',
                'password' => '12345',
            ]
        ];

        User::insert($list_users);
    }
}
