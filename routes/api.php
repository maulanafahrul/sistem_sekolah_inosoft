<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\NilaiController;
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
 //Soal 2:   Menampilkan detail suatu kelas (Tampilkan siswa apabila ada)  
Route::get('kelas/{id}', [KelasController::class, 'show']);       
//Soal 3:   Menyimpan data kelas baru
Route::post('kelas', [KelasController::class, 'store']);  
//Soal 4:   Memperbarui data kelas yang ada                
Route::put('kelas/{id}', [KelasController::class, 'update']);  
//Soal 5:   Menampilkan list siswa yang ada       
Route::get('siswa', [SiswaController::class, 'index']); 
Route::post('siswa', [SiswaController::class, 'store']); 



// pelengkap

Route::delete('kelas/{id}', [KelasController::class, 'destroy']);
Route::delete('siswa/{id}', [SiswaController::class, 'destroy']);
Route::get('mata_pelajaran', [MataPelajaranController::class, 'index']);
Route::post('mata_pelajaran', [MataPelajaranController::class, 'store']);
Route::post('nilai', [NilaiController::class, 'store']);

