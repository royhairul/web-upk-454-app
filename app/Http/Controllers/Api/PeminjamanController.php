<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PeminjamanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    public function store(PeminjamanRequest $request)
    {
        // Menyimpan Data ke dalam Array
        $validatedDataPeminjaman = $request->validated();
        
        // Jika Validasi Data PJMK Gagal
        if ($request->fails()) {
            return response()
                ->json([
                    'status' => 400,
                    'errors' => $request->messages()
                ])
                ->setStatusCode(400);
        }

        // Penyisipan data sesuai dengan kolom pada tabel PJMK
        Peminjaman::create([
            'peminjaman_pjmk' => $validatedDataPeminjaman['pjmk'],
            'peminjaman_ruangkelas' => $validatedDataPeminjaman['ruangkelas'],
            'peminjaman_matakuliah' => $validatedDataPeminjaman['matakuliah'],
            'peminjaman_tanggal' => $validatedDataPeminjaman['tanggal'],
            'peminjaman_waktu_mulai' => $validatedDataPeminjaman['waktu_mulai'],
            'peminjaman_waktu_selesai' => $validatedDataPeminjaman['waktu_selesai']
        ]);

        return response()->json(
            [
                'status' => 201,
                'msg' => 'Pengajuan Peminjaman Anda Telah Berhasil'
            ], 201
        );
    }
    public function show() {
        $listPeminjaman = Peminjaman::all();
        
        return response()->json([
            'status' => 200,
            'data' => $listPeminjaman
        ], 200);
    }
} 
