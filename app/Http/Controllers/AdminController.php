<?php

namespace App\Http\Controllers;

use App\Models\PJMK;
use App\Models\RuangKelas;
use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\Peminjaman;

class AdminController extends Controller
{
    public function index() {

        $all_peminjaman = Peminjaman::all();
        $stat_peminjaman = [
            'berlangsung' => count($all_peminjaman->where('peminjaman_status', 'Berlangsung')),
            'total' => count($all_peminjaman),
        ];

        $all_ruangan = RuangKelas::where('status', true)->get();
        $stat_ruangan = [
            'digunakan' => count($all_ruangan->where('ruangkelas_status', 'Digunakan')),
            'kosong' => count($all_ruangan->where('ruangkelas_status', 'Kosong')),
            'total'=> count($all_ruangan),
        ];

        // return dd($stat_ruangan);

        $peminjaman = Peminjaman::where('peminjaman_status', 'Berlangsung')
            ->join('tb_pjmk', 'pjmk_nim', 'peminjaman_pjmk')
            ->select('tb_peminjaman.*', 'tb_pjmk.*')
            ->orderBy('tb_pjmk.created_at', 'desc')
            ->limit(5)
            ->get();

        $ruangan = RuangKelas::where('status', true)
            ->select('*')
            ->get();

        return view("admin.dashboard", compact("peminjaman", "ruangan", "stat_peminjaman", "stat_ruangan"));
    }

    public function laporan() : View
    {
        $data = Peminjaman::where("peminjaman_status", 'Selesai')
                ->join('tb_pjmk', 'pjmk_nim', '=', 'peminjaman_pjmk')
                ->join('tb_ruangkelas', 'ruangkelas_code', 'peminjaman_ruangkelas')
                ->select('tb_peminjaman.*', 'tb_pjmk.*', 'tb_ruangkelas.ruangkelas_code')
                ->get();

        return view('admin.laporan', compact('data'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        
        if($searchTerm == null) {
            $data = Peminjaman::join('tb_pjmk', 'pjmk_nim', '=', 'peminjaman_pjmk')
                    ->join('tb_ruangkelas', 'ruangkelas_code', 'peminjaman_ruangkelas')
                    ->join('tb_matakuliah', 'matakuliah_id', 'peminjaman_matakuliah')
                    ->select('tb_peminjaman.peminjaman_id', 'tb_pjmk.pjmk_kelas', 'tb_ruangkelas.ruangkelas_code', 'tb_pjmk.pjmk_nama', 'tb_peminjaman.peminjaman_tanggal', 'tb_matakuliah.matakuliah_nama')
                    ->get();

        }

        $data = Peminjaman::join('tb_pjmk', 'pjmk_nim', '=', 'peminjaman_pjmk')
                ->join('tb_ruangkelas', 'ruangkelas_code', 'peminjaman_ruangkelas')
                ->join('tb_matakuliah', 'matakuliah_id', 'peminjaman_matakuliah')
                ->select('tb_peminjaman.peminjaman_id', 'tb_pjmk.pjmk_kelas', 'tb_ruangkelas.ruangkelas_code', 'tb_pjmk.pjmk_nama', 'tb_peminjaman.peminjaman_tanggal', 'tb_matakuliah.matakuliah_nama')
                ->where('tb_pjmk.pjmk_nama', 'like', '%' . $searchTerm . '%')
                ->orWhere('tb_pjmk.pjmk_kelas', 'like', '%' . $searchTerm . '%')
                ->get();

        return view('admin.laporan', compact('data'));
    }

    public function pjmk(Request $request)
    {
        $search = $request->input('search');

        if($search != null) {
            $data = PJMK::where('pjmk_nama','LIKE','%'. $search .'%')
                    ->orWhere('pjmk_prodi','LIKE','%'. $search .'%')
                    ->orWhere('pjmk_kelas','LIKE','%'. $search .'%')
                    ->get();
        }

        else {
            $data = PJMK::all();
        }

        return view('admin.pjmk.index', compact('data'));
    }
}
