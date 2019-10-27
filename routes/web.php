<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('hibah.daftar.index');
});

Route::get('/dashboard/daftar', function () {
    return view('dashboard.hibah.daftar.index');
})->name('hibah.daftar.index');

Route::get('/dashboard/riwayat', function () {
    return view('dashboard.hibah.riwayat.index');
})->name('hibah.riwayat.index');
