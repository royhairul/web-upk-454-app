<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterAccountRequest;
use App\Http\Requests\RegisterPersonalRequest;
use App\Models\PJMK;
use App\Models\User;
use Illuminate\Http\Request;

class ApiRegisterController extends Controller
{
    public function validatePersonal(RegisterPersonalRequest $request) {
        // Check Data in Database
        if(PJMK::where('pjmk_nim', $request->input('nim'))->exists()) {

            // If Data Already Exists
            return response()->json([
                'status' => 409,
                'msg' => 'Data sudah ada di dalam Database.'
            ], 409);
        }

        // Data validated
        return response()->json([
            "status" => 200,
            "msg" => "Validasi Data Personal Berhasil!"
        ]);
    }
    
    public function validateAccount(RegisterAccountRequest $request) {
        // Data Validated
        return response()->json([
            "status" => 200,
            "msg" => "Validasi Data Akun Berhasil!"
        ]);
    }

    public function register(Request $request) {
        // Save data to Model PJMK
        PJMK::create([
            'pjmk_nim' => $request->input('nim'),
            'pjmk_nama' => $request->input('nama'),
            'pjmk_kelas' => $request->input('kelas'),
            'pjmk_prodi' => $request->input('prodi'),
            'pjmk_phone' => $request->input('phone'),
            'pjmk_email' => $request->input('email'),
        ]);

        // Save data to Model User
        User::create([
            'nim' => $request->input('nim'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ]);

        // Response success
        return response()->json([
            'status' => 200,
            'msg'=> 'Registrasi Berhasil!'
        ]);
    }
}
