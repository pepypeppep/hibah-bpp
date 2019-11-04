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
Route::get('/dashboard/daftar/create', function () {
    return view('dashboard.hibah.daftar.create');
})->name('hibah.daftar.create');
Route::get('/dashboard/daftar/upload', function () {
    return view('dashboard.hibah.daftar.upload');
})->name('hibah.daftar.upload');

Route::get('/dashboard/riwayat', function () {
    return view('dashboard.hibah.riwayat.index');
})->name('hibah.riwayat.index');
Route::get('/dashboard/riwayat/1', function () {
    return view('dashboard.hibah.riwayat.show');
})->name('hibah.riwayat.show');
Route::get('/dashboard/riwayat/1/edit', function () {
    return view('dashboard.hibah.riwayat.edit');
})->name('hibah.riwayat.edit');
Route::get('/dashboard/riwayat/1/upload', function () {
    return view('dashboard.hibah.riwayat.upload');
})->name('hibah.riwayat.upload');


Route::group(['prefix' => 'staff'], function () {
    Route::get('/', function () {
        return redirect()->route('s_hibah.daftar.index');
    });
    Route::get('daftar', function () {
        return view('staff.hibah.daftar.index');
    })->name('s_hibah.daftar.index');
    Route::get('daftar/1/show', function () {
        return view('staff.hibah.daftar.show');
    })->name('s_hibah.daftar.show');

    Route::get('/pengaturan', 'Staff\HibahPengaturanController@index')->name('s_hibah.pengaturan.index');
    Route::get('/pengaturan/create', 'Staff\HibahPengaturanController@create')->name('s_hibah.pengaturan.create');
    Route::get('/pengaturan/{id}/show', 'Staff\HibahPengaturanController@show')->name('s_hibah.pengaturan.show');
    Route::get('/pengaturan/{id}/edit', 'Staff\HibahPengaturanController@edit')->name('s_hibah.pengaturan.edit');
    Route::post('/pengaturan/store', 'Staff\HibahPengaturanController@store')->name('s_hibah.pengaturan.store');
    Route::post('/pengaturan/{id}/update', 'Staff\HibahPengaturanController@update')->name('s_hibah.pengaturan.update');


    Route::get('pengaturan/show/1/1', function () {
        return view('staff.hibah.pengaturan.criteria');
    })->name('s_hibah.pengaturan.criteria');
});
