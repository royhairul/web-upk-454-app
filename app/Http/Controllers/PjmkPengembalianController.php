<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\PJMK;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PjmkPengembalianController extends Controller
{
    public function index()
    {
        $getUser = Auth::user();
        $pengembalian = Pengembalian::join('tb_peminjaman', 'pengembalian_pinjam', '=', 'peminjaman_id')
                        ->where('tb_peminjaman.peminjaman_pjmk','=', $getUser->nim)
                        ->select('tb_peminjaman.*', 'tb_pengembalian.*')
                        ->get();

        $user = PJMK::where('pjmk_nim', $getUser->nim)->get()[0];
        return view('user.pengembalian.index', compact('pengembalian', 'user')); 
    }

    public function create($id)
    {
        $getUser = Auth::user();
        $user = PJMK::where('pjmk_nim', $getUser->nim)->get()[0];

        $peminjaman = Peminjaman::where('peminjaman_id', $id)
                        ->select('tb_peminjaman.*')
                        ->get();

        session()->put('peminjaman_id', $peminjaman[0]->peminjaman_id);

        return view("user.pengembalian.create", compact("peminjaman", "user"));
    }

    public function store(Request $request)
    {
        // Validasi Gambar
        // Gambar foto_sebelum dan foto_sesudah harus terisi
        // Gambar foto_sebelum dan foto_sesudah harus file
        // Gambar foto_sebelum dan foto_sesudah harus berukuran max 2048MB
        $request->validate([
            "foto_sebelum"=> "required|file|mimes:jpg,png,gif|max:2048",
            "foto_sesudah"=> "required|file|mimes:jpg,png,gif|max:2048",
        ]);

        // Pengambilan Id Peminjaman dari Session
        $peminjaman_id = session('peminjaman_id');

        // Pengambilan waktu sekarang berdasarkan zona waktu
        date_default_timezone_set('Asia/Jakarta'); 
        $timenow = date('H:i:s', time());
        
        // Membuat Array untuk Menyimpan data
        $dataPengembalian = [
            'pengembalian_pinjam' => $peminjaman_id,
            'pengembalian_foto_sebelum'=> $request->file('foto_sebelum')->store('foto-sebelum'),
            'pengembalian_foto_sesudah'=> $request->file('foto_sesudah')->store('foto-sesudah'),
            'pengembalian_waktu' => $timenow,
        ];

        // Melakukan Penyimpanan Ke dalam Database
        Pengembalian::create($dataPengembalian);
        return redirect()->route('pjmk.kembali');
    }

    public function show(string $id)
    {
        $getUser = Auth::user();
        $user = PJMK::where('pjmk_nim', $getUser->nim)->get()[0];

        $peminjaman = Peminjaman::join('tb_pengembalian', 'pengembalian_pinjam', 'peminjaman_id')
                        ->select('tb_peminjaman.*')
                        ->get()[0];

        $pengembalian = Pengembalian::where('pengembalian_id', $id)
                        ->select('tb_pengembalian.*')
                        ->get()[0];

        return view('user.pengembalian.detail', compact('user', 'peminjaman', 'pengembalian'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
