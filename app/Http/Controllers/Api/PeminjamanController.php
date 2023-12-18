<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    public function store(Request $request)
    {
        $customMessages = [
            'required' => ':attribute field is required.'
        ];

        // Validasi Data PJMK
        $validatePeminjaman = Validator::make($request->all(), [
            'pjmk' => 'required',
            'ruangkelas' => 'required',
            'matakuliah' => 'required',
            'tanggal' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'fasilitas' => 'required'
        ], $customMessages);

        // Jika Validasi Data PJMK Gagal
        if ($validatePeminjaman->fails()) {
            return response()
                ->json([
                    'status' => 400,
                    'errors' => $validatePeminjaman->messages()
                ])
                ->setStatusCode(400);
        }

        // Menyimpan Data ke dalam Array
        $validatedDataPeminjaman = $validatePeminjaman->validated();

        // Penyisipan data sesuai dengan kolom pada tabel PJMK
        Peminjaman::create([
            'peminjaman_pjmk' => $validatedDataPeminjaman['pjmk'],
            'peminjaman_ruangkelas' => $validatedDataPeminjaman['ruangkelas'],
            'peminjaman_matakuliah' => $validatedDataPeminjaman['matakuliah'],
            'peminjaman_tanggal' => $validatedDataPeminjaman['tanggal'],
            'peminjaman_waktu_mulai' => $validatedDataPeminjaman['waktu_mulai'],
            'peminjaman_waktu_selesai' => $validatedDataPeminjaman['waktu_selesai'],
            'peminjaman_fasilitas' => $validatedDataPeminjaman['fasilitas'],
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
