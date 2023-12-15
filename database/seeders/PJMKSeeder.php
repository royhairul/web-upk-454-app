<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            ],
            [
                'pjmk_nim' => '362258302077',
                'pjmk_nama' => 'Jonathan',
                'pjmk_kelas' => '2F',
                'pjmk_prodi' => "TRPL",
                'pjmk_phone' => "08123456789",
                'pjmk_email' => 'jonathan@gmail.com',
                'pjmk_img' => null,
            ],
            [
                'pjmk_nim' => '362258302037',
                'pjmk_nama' => 'Sandi Sukoco Putro',
                'pjmk_kelas' => '2A',
                'pjmk_prodi' => "TRPL",
                'pjmk_phone' => "08123456789",
                'pjmk_email' => 'sandisp@gmail.com',
                'pjmk_img' => null,
            ],
            [
                'pjmk_nim' => '362258302012',
                'pjmk_nama' => 'John Doe',
                'pjmk_kelas' => '2C',
                'pjmk_prodi' => "TRPL",
                'pjmk_phone' => "08123456789",
                'pjmk_email' => 'test1@gmail.com',
                'pjmk_img' => null,
            ],
        ];

        PJMK::insert($list_pjmk);
    }
}
