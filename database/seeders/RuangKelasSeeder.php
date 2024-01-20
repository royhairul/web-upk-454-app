<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\RuangKelas;

class RuangKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list_ruangan = [
            [
                'ruangkelas_code' => 'C1.4',
                'ruangkelas_kapasitas' => '30',
                'ruangkelas_prodi' => 'TRPL',
                'ruangkelas_status' => 'Digunakan'
            ],
            [
                'ruangkelas_code' => 'C3.3',
                'ruangkelas_kapasitas' => '30',
                'ruangkelas_prodi' => 'TRPL',
                'ruangkelas_status' => 'Digunakan'
            ]
        ];

        RuangKelas::insert($list_ruangan);
    }
}
