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
                'ruangkelas_status' => 'Kosong'
            ],
            [
                'ruangkelas_code' => 'C3.3',
                'ruangkelas_kapasitas' => '30',
                'ruangkelas_prodi' => 'AGB',
                'ruangkelas_status' => 'Kosong'
            ],
            [
                'ruangkelas_code' => 'A1.4',
                'ruangkelas_kapasitas' => '30',
                'ruangkelas_prodi' => 'TRPL',
                'ruangkelas_status' => 'Kosong'
            ],
            [
                'ruangkelas_code' => 'A2.3',
                'ruangkelas_kapasitas' => '30',
                'ruangkelas_prodi' => 'TRM',
                'ruangkelas_status' => 'Kosong'
            ],
            [
                'ruangkelas_code' => 'B4.1',
                'ruangkelas_kapasitas' => '30',
                'ruangkelas_prodi' => 'TRPL',
                'ruangkelas_status' => 'Kosong'
            ],
            [
                'ruangkelas_code' => 'E1.5',
                'ruangkelas_kapasitas' => '30',
                'ruangkelas_prodi' => 'TPHT',
                'ruangkelas_status' => 'Kosong'
            ],
            [
                'ruangkelas_code' => 'A3.5',
                'ruangkelas_kapasitas' => '30',
                'ruangkelas_prodi' => 'MBP',
                'ruangkelas_status' => 'Kosong'
            ],
        ];

        RuangKelas::insert($list_ruangan);
    }
}
