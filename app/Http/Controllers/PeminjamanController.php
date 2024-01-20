<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    public function pengajuan(Request $data)
    {
        $filter = $data->query('filter');

        // Jika tidak ada pada parameter pada route 'peminjaman'
        // maka akan menampilkan semua peminjaman yang belum disetujui
        if($filter == 'true') {
            $peminjaman = Peminjaman::where('peminjaman_status', 'Disetujui')
                ->join('tb_ruangkelas', 'ruangkelas_code', 'peminjaman_ruangkelas')
                ->join('tb_matakuliah', 'matakuliah_id', 'peminjaman_matakuliah')
                ->join('tb_pjmk', 'pjmk_nim', 'peminjaman_pjmk')
                ->select('tb_peminjaman.*', 'tb_ruangkelas.ruangkelas_code', 'tb_pjmk.pjmk_kelas', 'tb_pjmk.pjmk_prodi', 'tb_matakuliah.matakuliah_nama')
                ->get();
        }
        if($filter == null) {
            $peminjaman = Peminjaman::where('peminjaman_status', 'Waiting')
                            ->join('tb_ruangkelas', 'ruangkelas_code', 'peminjaman_ruangkelas')
                            ->join('tb_matakuliah', 'matakuliah_id', 'peminjaman_matakuliah')
                            ->join('tb_pjmk', 'pjmk_nim', 'peminjaman_pjmk')
                            ->select('tb_peminjaman.*', 'tb_ruangkelas.ruangkelas_code', 'tb_pjmk.pjmk_kelas', 'tb_pjmk.pjmk_prodi', 'tb_matakuliah.matakuliah_nama')
                            ->get();
        }

        return view('admin.peminjaman.pengajuan', compact('peminjaman'));
    }

    public function peminjamanVerif($id) {
        $data = Peminjaman::where('peminjaman_id', $id )
                        ->join('tb_matakuliah', 'matakuliah_id', 'peminjaman_matakuliah')
                        ->join('tb_pjmk', 'pjmk_nim', 'peminjaman_pjmk')
                        ->select('tb_peminjaman.*', 'tb_pjmk.*', 'tb_matakuliah.matakuliah_nama')
                        ->get();
        return view('admin.peminjaman.verifikasi', compact('data'));
    }

    public function verifikasiPinjaman(Request $request, $id) {
        $data = Peminjaman::find($id);
        $data->peminjaman_status = $request->input('status');
        $data->save();

        return redirect()->route('admin.pengajuan');
    }
    
    public function viewPeminjaman() {
        $peminjaman = Peminjaman::where('peminjaman_status', 'Disetujui')
            ->join('tb_ruangkelas', 'ruangkelas_code', 'peminjaman_ruangkelas')
            ->join('tb_matakuliah', 'matakuliah_id', 'peminjaman_matakuliah')
            ->join('tb_pjmk', 'pjmk_nim', 'peminjaman_pjmk')
            ->select('tb_peminjaman.*', 'tb_ruangkelas.ruangkelas_code', 'tb_pjmk.pjmk_kelas', 'tb_pjmk.pjmk_prodi', 'tb_matakuliah.matakuliah_nama')
            ->get();
        return view('admin.peminjaman.peminjaman', compact('peminjaman'));
    }

    public function detailPeminjaman($id) {
        $peminjaman = Peminjaman::where('peminjaman_id', $id)
            ->join('tb_ruangkelas', 'ruangkelas_code', 'peminjaman_ruangkelas')
            ->join('tb_matakuliah', 'matakuliah_id', 'peminjaman_matakuliah')
            ->join('tb_pjmk', 'pjmk_nim', 'peminjaman_pjmk')
            ->select('tb_peminjaman.*', 'tb_ruangkelas.ruangkelas_code', 'tb_pjmk.pjmk_kelas', 'tb_pjmk.pjmk_prodi', 'tb_matakuliah.matakuliah_nama')
            ->get();
        return view('admin.peminjaman.verif_pinjam', compact('peminjaman'));
    }

    public function pengembalian()
    {

        return view('admin.pengembalian');
    }

}
