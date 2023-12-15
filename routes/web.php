<?php

use Illuminate\Support\Facades\Route;

// Controller
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

// Login
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.auth');

Route::get('/pjmk', fn () => view('user.index', ["title" => "Dashboard"]))->name('pjmk.index');

Route::get('/peminjaman', fn () => view('user.peminjaman', ["title" => "Peminjaman"]))->name('pjmk.pinjam');

Route::get('/peminjaman/create', fn () => view('user.create-peminjaman', ["title" => "Peminjaman"]))->name('pjmk.pinjam.create');


// Route::get('/test', [LoginController::class, 'authenticate']);