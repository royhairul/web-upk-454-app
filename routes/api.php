<?php

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

Route::post('/register', [RegisterController::class, 'validatePJMK']);
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/peminjaman', [PeminjamanController::class, 'show']);
Route::post('/peminjaman/create', [PeminjamanController::class, 'store']);

Route::get('/jadwal', [JadwalController::class, 'show']);
Route::post('/jadwal/create', [JadwalController::class, 'store']);
Route::put('/jadwal/{jadwalId}', [JadwalController::class, 'update']);

Route::get('/pjmk/{id}', [PjmkController::class, 'showById']);