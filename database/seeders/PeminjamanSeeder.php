<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Peminjaman;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list_peminjaman = [
            [
                'peminjaman_pjmk' => '362258302016',
                'peminjaman_ruangkelas' => 'C1.2',
                'peminjaman_matakuliah' => 'RPL001',
                'peminjaman_admin' => null,
                'peminjaman_fasilitas' => null,
                'peminjaman_tanggal' => '2023-05-01',
                'peminjaman_waktu_mulai' => '07:30:00',
                'peminjaman_waktu_selesai' => '12:30:00',
            ],
            [
                'peminjaman_pjmk' => '362258302016',
                'peminjaman_ruangkelas' => 'C3.1',
                'peminjaman_matakuliah' => 'RPL002',
                'peminjaman_admin' => null,
                'peminjaman_fasilitas' => null,
                'peminjaman_tanggal' => '2023-05-03',
                'peminjaman_waktu_mulai' => '07:30:00',
                'peminjaman_waktu_selesai' => '07:30:00',
            ],
            [
                'peminjaman_pjmk' => '362258302037',
                'peminjaman_ruangkelas' => 'C3.1',
                'peminjaman_matakuliah' => 'RPL002',
                'peminjaman_admin' => null,
                'peminjaman_fasilitas' => null,
                'peminjaman_tanggal' => '2023-05-01',
                'peminjaman_waktu_mulai' => '12:30:00',
                'peminjaman_waktu_selesai' => '14:10:00',
            ],
        ];
        Peminjaman::insert($list_peminjaman);
    }
}
