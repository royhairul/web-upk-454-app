<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Models\PJMK;
use App\Models\User;


class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showPersonalForm()
    {
        // Menampilkan Formulir untuk Personal Data
        return view("register", ["page" => "register-personal"]);
    }

    public function showAccountForm()
    {
        // Menampilkan Formulir untuk Account Data
        return view("register", ["page" => "register-account"]);
    }

    public function showConfirmation($isCreated)
    {
        return view('register', [
            "page" => "register-confirm",
            "isCreated" => $isCreated
        ]);
    }

    public function validatePersonal(Request $request)
    {
        // Custom Untuk Pesan Error
        $customMessages = [
            'required' => ':attribute field is required.',
            'email' => ':attribute must be valid email address.',
            'regex' => ':attribute field must start with "+62" or "0".',
        ];

        // Validasi Data PJMK
        $validateDataPJMK = $request->validate([
            'NIM' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'prodi' => 'required',
            'phone' => ['required', 'string', 'regex:/^(\+62|0)\d{9,15}$/'],
            'email' => 'required|email',
        ], $customMessages);

        // Jika Data Berhasil di Validasi
        if($validateDataPJMK) {
            // Mengambil Data dari Input
            $data = [
                'pjmk_nim' => $request->input('NIM'),
                'pjmk_nama' => $request->input('nama'),
                'pjmk_kelas' => $request->input('kelas'),
                'pjmk_prodi' => $request->input('prodi'),
                'pjmk_phone' => $request->input('phone'),
                'pjmk_email' => $request->input('email'),
            ];

            // Pengecekan data pada database
            if (PJMK::where('pjmk_nim', $data['pjmk_nim'])->exists()) {
                return $this->showConfirmation($isCreated = false);
            }

            // Menyimpan Data ke dalama Session
            session()->put('dataPJMK', $data);

            // Redirect menampilkan formulir untuk membuat Akun
            return redirect()->route('register.account');
        }

        // Jika Validasi Gagal
        return back()->withErrors($validateDataPJMK);
    }

    public function validateAccount(Request $request)
    {
        // Custom Untuk Pesan Error
        $customMessages = [
            'required' => ':attribute field is required.'
        ];

        // Validasi Data Account
        $validateDataAccount = $request->validate([
            'username' => 'required',
            'password' => 'required|confirmed'
        ], $customMessages);


        
        // Jika validasi Gagal
        if(!$validateDataAccount) {
            return back()->withErrors($validateDataAccount);
        }

        // Mengambil dataPJMK dengan session
        $dataPJMK = session('dataPJMK');

        // Mengambil data account
        $dataAccount = [
            'nim' => $dataPJMK['pjmk_nim'],
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ];
    
        // Menyimpan data PJMK ke dalam tabel PJMK
        $db_PJMK = PJMK::firstOrCreate($dataPJMK);

        // Melakukan pengecekan pada database
        if ($db_PJMK->wasRecentlyCreated)
        {
            // Jika belum ada pada Database
            // Menyimpan ke dalam database
            User::create($dataAccount);

            // Redirect ke halaman 
            return $this->showConfirmation($isCreated = true);
        }

        else 
        {
            // Jika sudah ada pada Database
            return $this->showConfirmation($isCreated = false);
        }
    }
}
