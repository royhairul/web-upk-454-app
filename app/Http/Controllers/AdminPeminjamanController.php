<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Pengembalian;
use App\Models\RuangKelas;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;

class AdminPeminjamanController extends Controller
{
    public function pengajuan(Request $data)
    {
        $filter = $data->query('filter');
        $search = $data->query('search');

        $peminjaman = Peminjaman::query();

        if($filter == 'true') {
            $peminjaman->where('peminjaman_status', 'Disetujui');
        }
        if($filter == null) {
            $peminjaman->where('peminjaman_status', 'Waiting');
        }

        if($search) {
            $peminjaman->where('ruangkelas_code', 'like', "%{$search}%");
        }

        $peminjaman = $peminjaman->join('tb_ruangkelas', 'ruangkelas_code', 'peminjaman_ruangkelas')
                                ->join('tb_pjmk', 'pjmk_nim', 'peminjaman_pjmk')
                                ->select('tb_peminjaman.*', 'tb_ruangkelas.ruangkelas_code', 'tb_pjmk.pjmk_kelas', 'tb_pjmk.pjmk_prodi')
                                ->get();

        return view('admin.peminjaman.pengajuan', compact('peminjaman'));
    }

    public function peminjamanVerif($id) {
        setlocale(LC_TIME, 'Indonesian');

        $data = Peminjaman::where('peminjaman_id', $id )
                        ->join('tb_pjmk', 'pjmk_nim', 'peminjaman_pjmk')
                        ->select('tb_peminjaman.*', 'tb_pjmk.*')
                        ->get()[0];
        return view('admin.peminjaman.pengajuan_detail', compact('data'));
    }

    public function verifikasiPengajuan(Request $request, $id) {
        $user = Auth::user()->username;

        $data = Peminjaman::find($id);
        $data->peminjaman_status = $request->input('status');
        $data->peminjaman_admin = $user;
        $data->save();

        return redirect()->route('admin.pengajuan');
    }
    
    public function viewPeminjaman(Request $data) {
        $search = $data->query('search');
        $peminjaman = Peminjaman::where('peminjaman_status', 'Disetujui')
            ->join('tb_ruangkelas', 'ruangkelas_code', 'peminjaman_ruangkelas')
            ->join('tb_pjmk', 'pjmk_nim', 'peminjaman_pjmk')
            ->select('tb_peminjaman.*', 'tb_ruangkelas.ruangkelas_code', 'tb_pjmk.*');
            
        
        if($search) {
            $peminjaman->where('ruangkelas_code', 'like', "%{$search}%");
        }

        $peminjaman = $peminjaman->get();
        return view('admin.peminjaman.peminjaman', compact('peminjaman'));
    }

    public function detailPeminjaman($id) {
        setlocale(LC_TIME, 'Indonesian');

        $data = Peminjaman::where('peminjaman_id', $id)
            ->join('tb_ruangkelas', 'ruangkelas_code', 'peminjaman_ruangkelas')
            ->join('tb_pjmk', 'pjmk_nim', 'peminjaman_pjmk')
            ->select('tb_peminjaman.*', 'tb_pjmk.*', 'tb_ruangkelas.ruangkelas_code')
            ->get()[0];

        $fasilitas = Fasilitas::where('status', true)
            ->where('fasilitas_status', 'Tersedia')
            ->where('fasilitas_type', 'Proyektor')
            ->select('*')
            ->get();

        return view('admin.peminjaman.peminjaman_detail', compact('data', 'fasilitas'));
    }

    public function verifikasiPeminjaman(Request $request, $id) {
        $user = Auth::user()->username;

        $data = Peminjaman::find($id);
        $data->peminjaman_status = "Berlangsung";
        $data->peminjaman_fasilitas = $request->input('fasilitas');
        $data->peminjaman_admin = $user;
        $data->save();

        // Mengganti status ruang kelas
        $ruangkelas = RuangKelas::find($data->peminjaman_ruangkelas);
        $ruangkelas->ruangkelas_status = 'Digunakan';
        $ruangkelas->save();

        // Mengganti status fasilitas
        $fasilitas = Fasilitas::find($data->peminjaman_fasilitas);
        if(isset($fasilitas)){
            $fasilitas->fasilitas_status = 'Digunakan';
            $fasilitas->save();        
        }
        return redirect()->route('admin.peminjaman');
    }

    public function pengembalian(Request $data)
    {
        $pengembalian = Pengembalian::where('pengembalian_status', 'Waiting')
                        ->join('tb_peminjaman', 'peminjaman_id', 'pengembalian_pinjam')
                        ->join('tb_pjmk', 'pjmk_nim','tb_peminjaman.peminjaman_pjmk')
                        ->select('tb_peminjaman.*', 'tb_pjmk.*', 'tb_pengembalian.pengembalian_id')
                        ->get();
        return view('admin.pengembalian.pengembalian', compact('pengembalian'));
    }

    public function detailPengembalian($id) {
        setlocale(LC_TIME, 'Indonesian');

        $data = Peminjaman::where('peminjaman_id', $id)
            ->join('tb_ruangkelas', 'ruangkelas_code', 'peminjaman_ruangkelas')
            ->join('tb_pjmk', 'pjmk_nim', 'peminjaman_pjmk')
            ->join('tb_pengembalian', 'pengembalian_pinjam', 'peminjaman_id')
            ->select('tb_peminjaman.*', 'tb_pjmk.*', 'tb_ruangkelas.ruangkelas_code', 'tb_pengembalian.*')
            ->get()[0];

        return view('admin.pengembalian.pengembalian_detail', compact('data'));
    }

    public function verifikasiPengembalian(Request $request, $id) {
        $user = Auth::user()->username;

        $pengembalian = Pengembalian::find($id);
        $pengembalian->pengembalian_status = $request->input('status');
        $pengembalian->pengembalian_admin = $user;
        $pengembalian->save();

        if($request->input('status') == 'Disetujui') {
            $data = Peminjaman::find($pengembalian->pengembalian_pinjam);
            $data->peminjaman_status = "Selesai";
            $data->save();
            
            // Mengganti status ruang kelas
            $ruangkelas = RuangKelas::find($data->peminjaman_ruangkelas);
            $ruangkelas->ruangkelas_status = 'Kosong';
            $ruangkelas->save();
            
            // Mengganti status fasilitas
            $fasilitas = Fasilitas::find($data->peminjaman_fasilitas);
            
            if(isset($fasilitas)) {
                $fasilitas->fasilitas_status = 'Tersedia';
                $fasilitas->save();    
            }    
            
        }
        
        return redirect()->route('admin.peminjaman');
    }

}