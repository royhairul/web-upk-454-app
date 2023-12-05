<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\PJMK;

class PJMKSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list_pjmk = [
            [
                'pjmk_nim' => '362258302016',
                'pjmk_nama' => 'Roy Hairul Anam',
                'pjmk_kelas' => '2F',
                'pjmk_prodi' => "TRPL",
                'pjmk_phone' => "08123456789",
                'pjmk_email' => 'royhairul@gmail.com',
                'pjmk_img' => null,
                'pjmk_password' => 12345,
            ],
            [
                'pjmk_nim' => '362258302037',
                'pjmk_nama' => 'Sandi Sukoco Putro',
                'pjmk_kelas' => '2A',
                'pjmk_prodi' => "TRPL",
                'pjmk_phone' => "08123456789",
                'pjmk_email' => 'sandisp@gmail.com',
                'pjmk_img' => null,
                'pjmk_password' => 12345,
            ]
        ];

        PJMK::insert($list_pjmk);
    }
}
