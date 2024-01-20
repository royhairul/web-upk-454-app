<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if($validateData->fails()) {
            return response()
                ->json([
                    'status' => 400,
                    'errors' => $validateData->messages()
                ])
                ->setStatusCode(400);
        }

        $validatedDataAkun = $validateData->validated();

        if (Auth::attempt($validatedDataAkun)) {

            // Isi dari Token
            $payload = [
                'id' => Auth::getUser()['nim'],
                'iat' => Carbon::now()->timestamp,
                'exp' => Carbon::now()->timestamp + 60*60*2
            ];

            // Buat Token
            $token = JWT::encode($payload, env('JWT_SECRET_KEY'), 'HS256');

            return response()->json(
                [
                    'status' => 200,
                    'msg' => 'Login Akun Berhasil!',
                    'token' => 'Bearer ' . $token
                ], 200
            );
        } 
        else {
            return response()->json(
                [
                    'status' => 401,
                    'errors' => ['msg' => 'Login Akun Gagal!']
                ], 401
            );
        }

    }
}
