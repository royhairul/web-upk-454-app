<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\Peminjaman;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $data = Peminjaman::join('tb_pjmk', 'pjmk_nim', '=', 'peminjaman_pjmk')
                            ->join('tb_ruangkelas', 'ruangkelas_code', 'peminjaman_ruangkelas')
                            ->join('tb_matakuliah', 'matakuliah_id', 'peminjaman_matakuliah')
                            ->select('tb_peminjaman.peminjaman_id', 'tb_pjmk.pjmk_kelas', 'tb_ruangkelas.ruangkelas_code', 'tb_pjmk.pjmk_nama', 'tb_peminjaman.peminjaman_tanggal', 'tb_matakuliah.matakuliah_nama')
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

    public function filter(Request $request) {
        $dateStart = $request->input('dateStart');
        $dateEnd = $request->input('dateEnd');

        $data = Peminjaman::join('tb_pjmk', 'pjmk_nim', '=', 'peminjaman_pjmk')
            ->join('tb_ruangkelas', 'ruangkelas_code', 'peminjaman_ruangkelas')
            ->join('tb_matakuliah', 'matakuliah_id', 'peminjaman_matakuliah')
            ->select('tb_peminjaman.peminjaman_id', 'tb_pjmk.pjmk_kelas', 'tb_ruangkelas.ruangkelas_code', 'tb_pjmk.pjmk_nama', 'tb_peminjaman.peminjaman_tanggal', 'tb_matakuliah.matakuliah_nama')
            ->whereBetween('tb_peminjaman.peminjaman_tanggal', [$dateStart, $dateEnd])
            ->get();

        return view('welcome');
    }
}
