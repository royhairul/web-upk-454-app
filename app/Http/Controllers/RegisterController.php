<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodi;
use App\Models\PJMK;
use App\Models\User;
use Illuminate\Validation\Rule;

set_time_limit(0);

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showPersonalForm()
    {
        // Mengambil data prodi
        $prodi = Prodi::all();

        //Menampilkan Formulir untuk Personal Data
        return view("register.register-personal", [
            "page" => "register-personal",
            "prodi" => $prodi
        ]);
    }

    public function showAccountForm()
    {
        // Menampilkan Formulir untuk Account Data
        return view("register.register-account", ["page" => "register-account"]);
    }

    public function showConfirmation($isCreated)
    {
        session()->flush();
        if (!isset($isCreated)) {
            return dd(empty($isCreated));
        }
        return view('register.register-confirm', [
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
            "regex:/[a-zA-Z]/" => ":attribute must be char not number.",
            'regex:/^[1-6][A-Z]$/' => ":attribute not valid.",
            "regex:/^(\+62|62|0)8[1-9][0-9]{6,9}$/" => ":attribute field must start with '+62' or '0'.",
        ];

        // Validasi Data PJMK
        $validateDataPJMK = $request->validate([
            'nim' => ['required', 'numeric', Rule::unique('tb_pjmk', 'pjmk_nim')],
            'nama' => [
                'required',
                'string',
                'regex:/^[^\d]+$/',
            ],
            'kelas' => 'required|regex:/^[1-4][A-Z]$/',
            'prodi' => 'required',
            'phone' => ['required', 'min:12', 'numeric', 'regex:/^(\+62|62|0)8[1-9][0-9]{6,9}$/'],
            'email' => 'required|email',
        ], $customMessages);

        // Jika Data Gagal  di Validasi
        if (!$validateDataPJMK) {
            return back()->withErrors($validateDataPJMK);
        }

        // Mengambil Data dari Input
        $data = [
            'pjmk_nim' => $request->input('nim'),
            'pjmk_nama' => $request->input('nama'),
            'pjmk_kelas' => $request->input('kelas'),
            'pjmk_prodi' => $request->input('prodi'),
            'pjmk_phone' => $request->input('phone'),
            'pjmk_email' => $request->input('email'),
        ];

        // Pengecekan data pada database
        if (PJMK::where('pjmk_nim', $data['pjmk_nim'])->exists()) {
            return $this->showConfirmation(false);
        } else {
            // Menyimpan Data ke dalama Session
            session()->put('dataPJMK', $data);

            // Redirect menampilkan formulir untuk membuat Akun
            return redirect()->route('register.account');
        }
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
        if (!$validateDataAccount) {
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
        if ($db_PJMK->wasRecentlyCreated) {
            // Jika belum ada pada Database
            // Menyimpan ke dalam database
            $user = User::create($dataAccount);
            $user->assignRole('pjmk');


            // Redirect ke halaman 
            return $this->showConfirmation(true);
        } else {
            // Jika sudah ada pada Database
            return $this->showConfirmation(false);
        }
    }
}
