<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\PJMK;
use App\Models\User;


class RegisterController extends Controller
{
    public function validatePJMK(Request $request)
    {
        // Custom Untuk Pesan Error
        $customMessages = [
            'required' => ':attribute field is required.',
            'email' => ':attribute must be valid email address.',
            'regex' => ':attribute field must start with "+62" or "0".'
        ];

        // Validasi Data PJMK
        $validateDataPJMK = Validator::make($request->all(), [
            "nim" => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'prodi' => 'required',
            'phone' => ['required', 'string', 'regex:/^(\+62|0)\d{9,15}$/'],
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required'
        ], $customMessages);

        // Jika Validasi Data PJMK Gagal
        if($validateDataPJMK->fails()) {
            return response()
                ->json([
                    'status' => 400,
                    'errors' => $validateDataPJMK->messages()
                ])
                ->setStatusCode(400);
        }

        // Menyimpan Data ke dalam Array
        $dataPJMK = $validateDataPJMK->validated();
        
        // Pengecekan apakah data sudah tersedia atau tidak
        if(PJMK::where('pjmk_nim', $dataPJMK['nim'])->exists()) {  
            return response()->json(
                [
                    'status' => 400,
                    'errors' => ['nim' => 'Data tersebut sudah Ada']
                ], 400
            );
        }

        // Penyisipan data sesuai dengan kolom pada tabel PJMK
        PJMK::create([
            'pjmk_nim' => $dataPJMK['nim'],
            'pjmk_nama' => $dataPJMK['nama'],
            'pjmk_kelas' => $dataPJMK['kelas'],
            'pjmk_prodi' => $dataPJMK['prodi'],
            'pjmk_phone' => $dataPJMK['phone'],
            'pjmk_email' => $dataPJMK['email'],
        ]);

        // Penyisipan data sesuai dengan kolom pada tabel Users
        User::create([
            'nim' => $dataPJMK['nim'],
            'username' => $dataPJMK['username'],
            'password' => $dataPJMK['password']
        ]);

        return response()->json(
            [
                'status' => 201,
                'msg' => 'Register Anda Teah Berhasil'
            ], 201
        );
    }
}
