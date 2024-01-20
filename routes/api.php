<?php

use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\ApiPeminjamanController;
use App\Http\Controllers\ApiRegisterController;
use App\Http\Controllers\ApiRuangKelasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\PeminjamanController;
use App\Http\Controllers\Api\JadwalController;
use App\Http\Controllers\Api\PjmkController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register/personal', [ApiRegisterController::class,'validatePersonal']);
Route::post('/register/account', [ApiRegisterController::class,'validateAccount']);
Route::post('/register', [ApiRegisterController::class, 'register']);

Route::post('/login', [ApiLoginController::class, 'authenticate']);

Route::get('/jadwal', [JadwalController::class, 'show']);
Route::post('/jadwal/create', [JadwalController::class, 'store']);
Route::put('/jadwal/{jadwalId}', [JadwalController::class, 'update']);

Route::get('/pjmk/{id}', [PjmkController::class, 'showById']);

// Ruang Kelas
Route::resource('/kelas', ApiRuangKelasController::class);

// Peminjaman
Route::resource('/peminjaman', ApiPeminjamanController::class);