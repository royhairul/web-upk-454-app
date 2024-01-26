<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Prodi;
use App\Models\RuangKelas;
use Illuminate\Support\Facades\Auth;
use App\Models\PJMK;
use App\Models\Peminjaman;

class PJMKController extends Controller
{
    public function index() {
        $getUser = Auth::user();
        $peminjaman = Peminjaman::where('peminjaman_pjmk', $getUser->nim)
            ->select('tb_peminjaman.*')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        setlocale(LC_TIME, 'Indonesian');
        $hari_ini = strftime('%Y-%m-%d', time());    
        $peminjaman_today = Peminjaman::where('peminjaman_pjmk', $getUser->nim)
            ->where('peminjaman_tanggal', $hari_ini)
            ->select('tb_peminjaman.*')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $user = PJMK::where('pjmk_nim', $getUser->nim)->get()[0];
        return view('user.dashboard', compact('user', 'peminjaman', 'peminjaman_today'));
    }

    public function cari() {
        $getUser = Auth::user();
        $user = PJMK::where('pjmk_nim', $getUser->nim)->get()[0];

        $ruangkelas = RuangKelas::all();

        $peminjamanPerRuang = [];

        foreach ($ruangkelas as $ruang) {
            $peminjaman = Peminjaman::where('peminjaman_ruangkelas', $ruang->ruangkelas_code)
                ->where('peminjaman_tanggal', '>=', now()->format('Y-m-d'))
                ->join('tb_pjmk', 'pjmk_nim', 'peminjaman_pjmk')
                ->select('tb_peminjaman.*', 'tb_pjmk.*')
                ->get()[0];
    
            $peminjamanPerRuang[$ruang->ruangkelas_code] = $peminjaman;
        }

        return view('user.pencarian', compact('user', 'ruangkelas', 'peminjamanPerRuang'));
    }

    public function history() {
        $getUser = Auth::user();
        $user = PJMK::where('pjmk_nim', $getUser->nim)->get()[0];

        $data = Peminjaman::where('peminjaman_pjmk', $getUser->nim)
                        ->where('peminjaman_status', 'Selesai')
                        ->select('tb_peminjaman.*')
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('user.riwayat.riwayat', compact('user', 'data'));
    }
}
