<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
            return response()->json(
                [
                    'status' => 200,
                    'msg' => 'Login Akun Berhasil!'
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
