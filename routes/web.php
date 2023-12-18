<?php

use Illuminate\Support\Facades\Route;

// Controller
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PjmkPeminjamanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/laporan', [PeminjamanController::class, 'index'])->name('admin.laporan');
Route::post('/admin/laporan', [PeminjamanController::class, 'search'])->name('search');

// Register
Route::get('/register', [RegisterController::class, 'showPersonalForm'])->name('register');
Route::post('/register', [RegisterController::class, 'validatePersonal'])->name('register.personal.store');
Route::get('/register/account', [RegisterController::class, 'showAccountForm'])->name('register.account');
Route::post('/register/account', [RegisterController::class, 'validateAccount'])->name('register.account.store');
Route::get('/register/confirmation', [RegisterController::class, 'confirm'])->name('register.confirm');

// Login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.auth');

// Route untuk PJMK
Route::get('/pjmk', fn () => view('user.dashboard', ["title" => "Dashboard"]))->name('pjmk.index');

// Route Peminjaman pada PJMK
Route::get('/peminjaman', [PjmkPeminjamanController::class, 'index'])->name('pjmk.pinjam');
Route::get('/peminjaman/create', [PjmkPeminjamanController::class, 'create'])->name('pjmk.pinjam.create');
Route::post('/peminjaman/create', [PjmkPeminjamanController::class, 'store'])->name('pjmk.pinjam.store');
Route::get('/peminjaman/edit', [PjmkPeminjamanController::class, 'edit'])->name('pjmk.pinjam.edit');
Route::post('/peminjaman/edit', [PjmkPeminjamanController::class, 'update'])->name('pjmk.pinjam.update');

// Route Jadwal PJMK
