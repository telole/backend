<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\LaporanDaruratController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PenggunaanObatController;
use App\Http\Controllers\ProfileController;
use App\Models\chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
route::post('/register', [AuthController::class, 'register']);
route::post('/login', [AuthController::class, 'login']);


Route::middleware(['auth:sanctum'])->group(function () {
    //AuthAuthAuth
    route::post('/logout', [AuthController::class, 'logout']);

    //Profile
    route::get('/profile', [ProfileController::class, 'index']);
    route::put('/profiles', [ProfileController::class, 'update']);

    //Kunjungan
    route::get('/kunjungan-uks', [KunjunganController::class, 'index']);
    route::post('/kunjungan', [KunjunganController::class, 'store']);
    route::get('/kunjungan/{id}', [KunjunganController::class, 'show']);
    route::put('/kunjungan/{id}', [KunjunganController::class, 'update']);
    route::delete('/kunjungan/{id}', [KunjunganController::class, 'destroy']);

    //penggunaanObat
    route::get('penggunaan_obat', [PenggunaanObatController::class, 'index']);
    route::post('/penggunaan_obat', [PenggunaanObatController::class, 'store']);
    route::get('/penggunaan_obat/{id}', [PenggunaanObatController::class, 'show']);
    route::delete('/penggunaan_obat/{id}', [PenggunaanObatController::class, 'destroy']);


    //obat
    Route::get('obat', [ObatController::class, 'index']);
    Route::post('obat', [ObatController::class, 'store']);
    Route::get('obat/{id}', [ObatController::class, 'show']);
    Route::put('obat/{id}', [ObatController::class, 'update']);
    Route::delete('obat/{id}', [ObatController::class, 'destroy']);

    //Artikel
    Route::get('artikel', [ArtikelController::class, 'index']);
    Route::post('artikel', [ArtikelController::class, 'store']);
    Route::get('artikel/{id}', [ArtikelController::class, 'show']);
    Route::put('artikel/{id}', [ArtikelController::class, 'update']);
    Route::delete('artikel/{id}', [ArtikelController::class, 'destroy']);

    //konsultasi
    Route::get('konsultasi', [KonsultasiController::class, 'index']);
    Route::post('konsultasi', [KonsultasiController::class, 'store']);
    Route::get('konsultasi/{id}', [KonsultasiController::class, 'show']);
    Route::put('konsultasi/{id}', [KonsultasiController::class, 'update']);
    Route::delete('konsultasi/{id}', [KonsultasiController::class, 'destroy']);

    //UrgentCalss
    Route::get('laporan_darurat', [LaporanDaruratController::class, 'index']);
    Route::post('laporan_darurat', [LaporanDaruratController::class, 'store']);
    Route::get('laporan_darurat/{id}', [LaporanDaruratController::class, 'show']);
    Route::put('laporan_darurat/{id}', [LaporanDaruratController::class, 'update']);
    Route::delete('laporan_darurat/{id}', [LaporanDaruratController::class, 'destroy']);

    //chat
    Route::get('chat/{userId}', [ChatController::class, 'getMessagesWithUser']);
    Route::post('chat/send', [ChatController::class, 'sendMessage']);


});

// Route::middleware(['auth:sanctum', 'role:siswa'])->group(function () {
//     Route::get('/siswa/dashboard', [SiswaController::class, 'index']);
// });

// Route::middleware(['auth:sanctum', 'role:petugas'])->group(function () {
//     Route::get('/petugas/dashboard', [PetugasController::class, 'index']);
// });
