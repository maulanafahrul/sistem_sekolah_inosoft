<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Soal 1:   Menampilkan list kelas yang ada  
Route::get('kelas', [KelasController::class, 'index']);    
//Soal 3:   Menyimpan data kelas baru
Route::post('kelas/store', [KelasController::class, 'store']);  
//Soal 5:   Menampilkan list siswa yang ada       
Route::get('siswa', [SiswaController::class, 'index']);                 