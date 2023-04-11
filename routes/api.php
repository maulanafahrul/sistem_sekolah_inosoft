<?php

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


Route::get('kelas', 'KelasController@index')->name('kelas.index');
Route::get('kelas/{id}', 'KelasController@show')->name('kelas.show');
Route::post('kelas', 'KelasController@store')->name('kelas.store');
Route::put('kelas/{id}', 'KelasController@update')->name('kelas.update');;