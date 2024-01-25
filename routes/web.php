<?php

use App\Http\Controllers\PJMKController;
use App\Http\Controllers\PjmkPengembalianController;
use Illuminate\Support\Facades\Route;

// Controller
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPeminjamanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PjmkPeminjamanController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\AdminRuangKelasController;
use App\Http\Controllers\AdminInventarisController;

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
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

// Admin Laporan
Route::get('/admin/laporan', [AdminController::class, 'laporan'])->name('admin.laporan');
Route::post('/admin/laporan', [AdminController::class, 'search'])->name('search');

// Admin Peminjaman dan pengembalian
Route::get('/admin/pengajuan/', [AdminPeminjamanController::class, 'pengajuan'])->name('admin.pengajuan');
Route::get('/admin/pengajuan/{id}', [AdminPeminjamanController::class, 'peminjamanVerif'])->name('admin.pengajuan.verif');
Route::post('/admin/pengajuan/{id}', [AdminPeminjamanController::class, 'verifikasiPengajuan'])->name('admin.pengajuan.verif.update');

Route::get('/admin/peminjaman/', [AdminPeminjamanController::class, 'viewPeminjaman'])->name('admin.peminjaman');
Route::get('/admin/peminjaman/{id}', [AdminPeminjamanController::class, 'detailPeminjaman'])->name('admin.peminjaman.verif');
Route::post('/admin/peminjaman/{id}', [AdminPeminjamanController::class, 'verifikasiPeminjaman'])->name('admin.peminjaman.verif.update');

Route::get('/admin/pengembalian', [AdminPeminjamanController::class, 'pengembalian'])->name('admin.pengembalian');
Route::get('/admin/pengembalian/{id}', [AdminPeminjamanController::class, 'detailPengembalian'])->name('admin.pengembalian.verif');
Route::post('/admin/pengembalian/{id}', [AdminPeminjamanController::class, 'verifikasiPengembalian'])->name('admin.pengembalian.verif.update');

// Admin untuk List PJMK
Route::get('/admin/pjmk', [AdminController::class, 'pjmk'])->name('admin.pjmk');

// Route untuk Inventaris
Route::resource('/admin/inventaris', AdminInventarisController::class, ['names' => 'admin.inventaris']);
Route::put('/admin/inventaris/{id}/delete', [AdminInventarisController::class, 'delete'])->name('admin.inventaris.delete');

// Route untuk ruangkelas
Route::resource('/admin/kelas', AdminRuangKelasController::class, ['names' => 'admin.kelas']);
Route::put('/admin/kelas/{id}/delete', [AdminRuangKelasController::class, 'delete'])->name('admin.kelas.delete');

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

// Route Pengembalian pada PJMK
Route::get('/pjmk/pengembalian', [PjmkPengembalianController::class, 'index'])->name('pjmk.kembali');
Route::get('/pjmk/pengembalian/{id}/create', [PjmkPengembalianController::class, 'create'])->name('pjmk.kembali.create');
Route::post('/pjmk/pengembalian/create', [PjmkPengembalianController::class, 'store'])->name('pjmk.kembali.store');
Route::get('/pjmk/pengembalian/{id}', [PjmkPengembalianController::class, 'show'])->name('pjmk.kembali.detail');
// Route::get('/pjmk/peminjaman/edit', [PjmkPengembalianController::class, 'edit'])->name('pjmk.pinjam.edit');
// Route::post('/pjmk/peminjaman/edit', [PjmkPengembalianController::class, 'update'])->name('pjmk.pinjam.update');

// Route Jadwal PJMK 
Route::get('/pjmk/jadwal', [PJMKController::class, 'jadwal'])->name('pjmk.jadwal');
Route::get('/pjmk/jadwal/create', [PJMKController::class, 'createJadwal'])->name('pjmk.jadwal.create');

// Route History
Route::get('/pjmk/riwayat', [PJMKController::class,'history'])->name('pjmk.riwayat');