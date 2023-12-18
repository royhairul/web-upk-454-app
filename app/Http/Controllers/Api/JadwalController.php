<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    public function store(Request $request)
    {
        $customMessages = [
            'required' => ':attribute field is required.'
        ];

        // Validasi Data PJMK
        $validateJadwal = Validator::make($request->all(), [
            'hari' => 'required',
            'matakuliah' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'ruangkelas' => 'required',
        ], $customMessages);

        // Jika Validasi Data PJMK Gagal
        if ($validateJadwal->fails()) {
            return response()
                ->json([
                    'status' => 400,
                    'errors' => $validateJadwal->messages()
                ])
                ->setStatusCode(400);
        }

        // Menyimpan Data ke dalam Array
        $validatedDataJadwal = $validateJadwal->validated();

        // Penyisipan data sesuai dengan kolom pada tabel PJMK
        Jadwal::create([
            'jadwal_hari' => $validatedDataJadwal['hari'],
            'jadwal_matakuliah' => $validatedDataJadwal['matakuliah'],
            'jadwal_ruangkelas' => $validatedDataJadwal['ruangkelas'],
            'jadwal_waktu_mulai' => $validatedDataJadwal['waktu_mulai'],
            'jadwal_waktu_selesai' => $validatedDataJadwal['waktu_selesai']
        ]);

        return response()->json(
            [
                'status' => 201,
                'msg' => 'Pembuatan Jadwal Anda Telah Berhasil'
            ], 201
        );
    }

    public function show()
    {
        $listJadwal = [
            'Senin' => Jadwal::where('jadwal_hari', 'Senin')->get(),
            'Selasa' => Jadwal::where('jadwal_hari', 'Selasa')->get(),
            'Rabu' => Jadwal::where('jadwal_hari', 'Rabu')->get(),
            'Kamis' => Jadwal::where('jadwal_hari', 'Kamis')->get(),
            'Jumat' => Jadwal::where('jadwal_hari', 'Jumat')->get(),
            'Sabtu' => Jadwal::where('jadwal_hari', 'Sabtu')->get()
        ];

        return response()->json([
            'status' => 200,
            'data' => $listJadwal
        ], 200);
    }

    public function update(Request $request, $JadwalId)
    {
        $customMessages = [
            'required' => ':attribute field is required.'
        ];

        // Validasi Data PJMK
        $validateJadwal = Validator::make($request->all(), [
            'hari' => 'in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
            'matakuliah' => '',
            'waktu_mulai' => '',
            'waktu_selesai' => '',
            'ruangkelas' => '',
        ], $customMessages);

        // Jika Validasi Data PJMK Gagal
        if ($validateJadwal->fails()) {
            return response()
                ->json([
                    'status' => 400,
                    'errors' => $validateJadwal->messages()
                ])
                ->setStatusCode(400);
        }

        // Menyimpan Data ke dalam Array
        $validatedDataJadwal = $validateJadwal->validated();

        // Penyisipan data sesuai dengan kolom pada tabel PJMK
        Jadwal::where('jadwal_id', $JadwalId)->update([
            'jadwal_hari' => $validatedDataJadwal['hari'],
            'jadwal_matakuliah' => $validatedDataJadwal['matakuliah'],
            'jadwal_ruangkelas' => $validatedDataJadwal['ruangkelas'],
            'jadwal_waktu_mulai' => $validatedDataJadwal['waktu_mulai'],
            'jadwal_waktu_selesai' => $validatedDataJadwal['waktu_selesai']
        ]);

        return response()->json(
            [
                'status' => 201,
                'msg' => 'Jadwal Anda Telah diupdat'
            ], 201
        );
    }
}
