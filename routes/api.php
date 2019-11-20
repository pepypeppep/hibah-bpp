<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('pegawai/search', 'API\PegawaiController@search')->name('pegawai.search');
Route::get('pegawai/add', 'API\PegawaiController@add')->name('pegawai.add');
Route::get('mahasiswa/search', 'API\MahasiswaController@search')->name('mahasiswa.search');
Route::get('mahasiswa/add', 'API\MahasiswaController@add')->name('mahasiswa.add');
Route::get('noncivitas/add', 'API\NonCivitasController')->name('noncivitas.add');
Route::get('reviewer/search', 'API\ReviewerController@search')->name('reviewer.search');
