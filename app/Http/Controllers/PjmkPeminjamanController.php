<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\RuangKelas;
use App\Models\MataKuliah;
use App\Models\PJMK;
use Illuminate\Support\Facades\Auth;

class PjmkPeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getUser = Auth::user();
        $peminjaman = Peminjaman::where('peminjaman_pjmk', $getUser->nim)
                        ->join('tb_matakuliah', 'matakuliah_id', 'peminjaman_matakuliah')
                        ->select('tb_peminjaman.*', 'tb_matakuliah.matakuliah_nama')
                        ->orderBy('created_at', 'desc')
                        ->get();

        $user = PJMK::where('pjmk_nim', $getUser->nim)->get()[0];
        return view('user.peminjaman.index', compact('peminjaman', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $getUser = Auth::user();
        $user = PJMK::where('pjmk_nim', $getUser->nim)->get()[0];

        $ruangkelas = RuangKelas::all();
        $matakuliah = MataKuliah::all();
        return view('user.peminjaman.create', compact('ruangkelas', 'matakuliah', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        // Custom Untuk Pesan Error
        $customMessages = [
            'required' => ':attribute field is required.'
        ];

        // Validasi Data Account
        $validateDataPeminjaman = $request->validate([
            'ruangkelas' => 'required',
            'tanggal' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required|after:waktu_mulai',
            'matakuliah' => 'required',
        ], $customMessages);

        // Jika validasi Gagal
        if (!$validateDataPeminjaman) {
            return back()->withErrors($validateDataPeminjaman);
        }

        $dataPeminjaman = [
            'peminjaman_pjmk' => $user->nim,
            'peminjaman_ruangkelas' => $request->input('ruangkelas'),
            'peminjaman_tanggal' => $request->input('tanggal'),
            'peminjaman_matakuliah' => $request->input('matakuliah'),
            'peminjaman_waktu_mulai' => $request->input('waktu_mulai'),
            'peminjaman_waktu_selesai' => $request->input('waktu_selesai'),
            'peminjaman_fasilitas' => '100'
        ];

        // Menyimpan data Jadwal ke dalam tabel tb_jadwal
        $peminjaman = Peminjaman::create($dataPeminjaman);

        return redirect()->route('pjmk.pinjam');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $getUser = Auth::user();
        $user = PJMK::where('pjmk_nim', $getUser->nim)->get()[0];

        $peminjaman = Peminjaman::where('peminjaman_id', $id)
                        ->join('tb_matakuliah', 'matakuliah_id', 'peminjaman_matakuliah')
                        ->select('tb_peminjaman.*', 'tb_matakuliah.matakuliah_nama')
                        ->get()[0];

        return view('user.peminjaman.detail', compact('user', 'peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('user.peminjaman.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //  Untuk melakukan perubahan data pada database
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
