<?php

use Illuminate\Support\Facades\Route;

// Controller
use App\Http\Controllers\PeminjamanController;

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

Route::get('/admin/laporan', [PeminjamanController::class, 'index']);

Route::post('/admin/laporan/search', [PeminjamanController::class, 'search'])->name('search');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/pjmk', function () {
    return view('user.index');
})->name('pjmk.index');

Route::get('/test', [PeminjamanController::class, 'index']);