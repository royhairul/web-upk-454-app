<?php

use App\Http\Controllers\PJMKController;
use Illuminate\Support\Facades\Route;

// Controller
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PjmkPeminjamanController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\RuangKelasController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\LaporanController;

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

// Route untuk Admin

// Admin Dashboard
Route::get('/admin', fn() => view('admin.dashboard'))->name('admin.dashboard');

// Admin Laporan
Route::get('/admin/laporan', [LaporanController::class, 'index'])->name('admin.laporan');
Route::post('/admin/laporan', [LaporanController::class, 'search'])->name('search');

// Admin Peminjaman dan pengembalian
Route::get('/admin/pengajuan/', [PeminjamanController::class, 'pengajuan'])->name('admin.pengajuan');

Route::get('/admin/pengajuan/{id}', [PeminjamanController::class, 'peminjamanVerif'])->name('admin.pengajuan.verif');
Route::post('/admin/pengajuan/{id}', [PeminjamanController::class, 'verifikasiPinjaman'])->name('admin.pengajuan.verif.update');

Route::get('/admin/peminjaman/', [PeminjamanController::class, 'viewPeminjaman'])->name('admin.peminjaman');
Route::get('/admin/peminjaman/{id}', [PeminjamanController::class, 'detailPeminjaman'])->name('admin.peminjaman.verif');

Route::get('/admin/pengembalian', [PeminjamanController::class, 'pengembalian'])->name('admin.pengembalian');

// Route untuk Inventaris
Route::resource('/admin/inventaris', InventarisController::class, ['names' => 'admin.inventaris']);

// Route untuk ruangkelas
Route::resource('/admin/kelas', RuangKelasController::class, ['names' => 'admin.kelas']);

// Route untuk Jadwal
Route::resource('/admin/jadwal', JadwalController::class, ['names' => 'admin.jadwal']);

// Register
Route::get('/register', [RegisterController::class, 'showPersonalForm'])->name('register');
Route::post('/register', [RegisterController::class, 'validatePersonal'])->name('register.personal.store');
Route::get('/register/account', [RegisterController::class, 'showAccountForm'])->name('register.account');
Route::post('/register/account', [RegisterController::class, 'validateAccount'])->name('register.account.store');
Route::get('/register/confirmation', [RegisterController::class, 'showConfirmation'])->name('register.confirm');

// Login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route untuk PJMK
Route::get('/pjmk', [PJMKController::class, 'index'])->name('pjmk.index');
Route::get('/pjmk/cari', [PJMKController::class, 'cari'])->name('pjmk.cari');

// Route Peminjaman pada PJMK
Route::get('/pjmk/peminjaman', [PjmkPeminjamanController::class, 'index'])->name('pjmk.pinjam');
Route::get('/pjmk/peminjaman/create', [PjmkPeminjamanController::class, 'create'])->name('pjmk.pinjam.create');
Route::post('/pjmk/peminjaman/create', [PjmkPeminjamanController::class, 'store'])->name('pjmk.pinjam.store');
Route::get('/pjmk/peminjaman/edit', [PjmkPeminjamanController::class, 'edit'])->name('pjmk.pinjam.edit');
Route::post('/pjmk/peminjaman/edit', [PjmkPeminjamanController::class, 'update'])->name('pjmk.pinjam.update');
Route::get('/pjmk/peminjaman/{id}', [PjmkPeminjamanController::class, 'show'])->name('pjmk.pinjam.detail');

// Route Jadwal PJMK
Route::get('/pjmk/jadwal', [PJMKController::class, 'jadwal'])->name('pjmk.jadwal');
Route::get('/pjmk/jadwal/create', [PJMKController::class, 'createJadwal'])->name('pjmk.jadwal.create');