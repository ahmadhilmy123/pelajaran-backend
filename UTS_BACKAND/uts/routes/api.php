<?php

use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;




Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout']);


Route::get('/karyawan', [KaryawanController::class, 'index']);
Route::post('/karyawan', [KaryawanController::class, 'store']);
Route::get('/karyawan/{id}', [KaryawanController::class, 'show']);
Route::put('/karyawan/{id}', [KaryawanController::class, 'update']);
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy']);
Route::get('/karyawan/search/{name}', [KaryawanController::class, 'search']);
Route::get('/karyawan/status/active', [KaryawanController::class, 'active']);
Route::get('/karyawan/status/inactive', [KaryawanController::class, 'inactive']);
Route::get('/karyawan/status/terminated', [KaryawanController::class, 'terminated']);
