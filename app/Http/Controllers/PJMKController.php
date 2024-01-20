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
            ->join('tb_matakuliah', 'matakuliah_id', 'peminjaman_matakuliah')
            ->select('tb_peminjaman.*', 'tb_matakuliah.matakuliah_nama')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $user = PJMK::where('pjmk_nim', $getUser->nim)->get()[0];
        return view('user.dashboard', compact('user', 'peminjaman'));
    }

    public function cari() {
        setlocale(LC_TIME, 'Indonesian'); // Set locale ke bahasa Indonesia
          
        $hari_ini = strftime('%A', time());

        $ruangkelas_per_hari = Jadwal::where('jadwal_hari',$hari_ini)
                                ->join('tb_ruangkelas', 'ruangkelas_code', 'jadwal_ruangkelas')
                                ->select('tb_jadwal.*', 'tb_ruangkelas.*')
                                ->get();

        return view('user.pencarian', compact('ruangkelas_per_hari'));
    }

    public function jadwal() {
        $jadwal_per_hari = [
            "Senin" => Jadwal::where('jadwal_hari', 'Senin')->get(),
            "Selasa" => Jadwal::where('jadwal_hari', 'Selasa')->get(),
            "Rabu" => Jadwal::where('jadwal_hari', 'Rabu')->get(),
            "Kamis" => Jadwal::where('jadwal_hari', 'Kamis')->get(),
            "Jumat" => Jadwal::where('jadwal_hari', 'Jumat')->get()
        ];
        return view('user.jadwal.index', compact('jadwal_per_hari'));
    }

    public function createJadwal() {
        $prodi = Prodi::all();
        $ruangkelas = RuangKelas::all();
        return view('user.jadwal.create', compact('prodi', 'ruangkelas'));
    }
}
