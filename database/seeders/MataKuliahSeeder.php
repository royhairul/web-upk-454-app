<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MataKuliah;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list_matkul = [
            [
                'matakuliah_id' => 'RPL001',
                'matakuliah_nama' => 'Metode dan Model Pengembangan Perangkat Lunak',
                'matakuliah_dosen' => 'Ruth Ema'
            ],
            [
                'matakuliah_id' => 'RPL002',
                'matakuliah_nama' => 'Rekayasa Kebutuhan Perangkat Lunak',
                'matakuliah_dosen' => 'Dianni Yusuf'
            ]
        ];
        MataKuliah::insert($list_matkul);
    }
}
