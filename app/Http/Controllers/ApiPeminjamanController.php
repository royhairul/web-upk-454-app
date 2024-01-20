<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeminjamanRequest;
use Illuminate\Http\Request;
use App\Models\Peminjaman;

class ApiPeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "msg" => 'Anda masuk API Peminjaman' 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json([
            "msg" => 'Anda masuk API Peminjaman Create' 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PeminjamanRequest $request)
    {
        // Menyimpan Data ke dalam Array
        $dataPeminjaman = $request->validated();

        // Penyisipan data sesuai dengan kolom pada tabel PJMK
        Peminjaman::create([
            'peminjaman_pjmk' => $dataPeminjaman['pjmk'],
            'peminjaman_ruangkelas' => $dataPeminjaman['ruangkelas'],
            'peminjaman_matakuliah' => $dataPeminjaman['matakuliah'],
            'peminjaman_tanggal' => $dataPeminjaman['tanggal'],
            'peminjaman_waktu_mulai' => $dataPeminjaman['waktu_mulai'],
            'peminjaman_waktu_selesai' => $dataPeminjaman['waktu_selesai'],
            'peminjaman_fasilitas' => $dataPeminjaman['fasilitas'],
        ]);

        return response()->json(
            [
                'status' => 201,
                'msg' => 'Pengajuan Peminjaman Anda Telah Berhasil',
                'data' => $dataPeminjaman
            ], 201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataByNim = Peminjaman::where('peminjaman_pjmk', $id)->get();

        return response()->json([
            'status' => 200,
            'data' => $dataByNim
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
