<?php

use App\Http\Controllers\KelasController;
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

//Soal 1:   Menampilkan list kelas yang ada   
Route::get('kelas', [KelasController::class, 'index']);      
 //Soal 2:   Menampilkan detail suatu kelas (Tampilkan siswa apabila ada)           
Route::get('kelas/show/{id}', [KelasController::class, 'show']);       