<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prodi;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list_prodi = [
            [
                'prodi_code' => 'TRPL',
                'prodi_nama' => 'Teknologi Rekayasa Perangkat Lunak',
                'prodi_jurusan' => 'Bisnis dan Informatika'
            ],
            [
                'prodi_code' => 'TRK',
                'prodi_nama' => 'Teknologi Rekayasa Komputer',
                'prodi_jurusan' => 'Bisnis dan Informatika'
            ],
            [
                'prodi_code' => 'BD',
                'prodi_nama' => 'Bisnis Digital',
                'prodi_jurusan' => 'Bisnis dan Informatika'
            ],
            [
                'prodi_code' => 'AGB',
                'prodi_nama' => 'Agribisnis',
                'prodi_jurusan' => 'Pertanian'
            ],
            [
                'prodi_code' => 'TPHT',
                'prodi_nama' => 'Teknologi Pengolahan Hasil Ternak',
                'prodi_jurusan' => 'Pertanian'
            ],
            [
                'prodi_code' => 'TS',
                'prodi_nama' => 'Teknik Sipil',
                'prodi_jurusan' => 'Teknik Sipil'
            ],
            [
                'prodi_code' => 'TRKJJ',
                'prodi_nama' => 'Teknologi Rekayasa Konstruksi Jalan & Jembatan',
                'prodi_jurusan' => 'Teknik Sipil'
            ],
            [
                'prodi_code' => 'TRM',
                'prodi_nama' => 'Teknologi Rekayasa Manufaktur',
                'prodi_jurusan' => 'Teknik Mesin'
            ],
            [
                'prodi_code' => 'TMK',
                'prodi_nama' => 'Teknik Manufaktur Kapal',
                'prodi_jurusan' => 'Teknik Mesin'
            ],
            [
                'prodi_code' => 'MBP',
                'prodi_nama' => 'Manajemen Bisnis Pariwisata',
                'prodi_jurusan' => 'Pariwisata'
            ],
            [
                'prodi_code' => 'DEP',
                'prodi_nama' => 'Destinasi Pariwisata',
                'prodi_jurusan' => 'Pariwisata'
            ],
        ];

        Prodi::insert($list_prodi);
    }
}
