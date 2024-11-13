<?php

use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
Route::post('/logout', [AuthController::class, 'logout']);
    
    
    Route::get('/karyawan', [KaryawanController::class, 'index']);
    Route::post('/karyawan', [KaryawanController::class, 'store']);
    Route::get('/karyawan/{id}', [KaryawanController::class, 'show']);
    Route::put('/karyawan/{id}', [KaryawanController::class, 'update']);
    Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy']);
    Route::get('/karyawan/cari/{nama}', [KaryawanController::class, 'search']);
    Route::get('/karyawan/status/aktif', [KaryawanController::class, 'aktif']);
    Route::get('/karyawan/status/nonaktif', [KaryawanController::class, 'nonaktif']);
    Route::get('/karyawan/status/diberhentikan', [KaryawanController::class, 'diberhentikan']);
});