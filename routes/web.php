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
        return redirect()->route('hibah.daftar.index');
    });
    Route::get('daftar', function () {
        return view('staff.hibah.daftar.index');
    })->name('s_hibah.daftar.index');

    Route::get('pengaturan', function () {
        return view('staff.hibah.pengaturan.index');
    })->name('s_hibah.pengaturan.index');
    Route::get('pengaturan/create', function () {
        return view('staff.hibah.pengaturan.create');
    })->name('s_hibah.pengaturan.create');
    Route::get('pengaturan/edit/1', function () {
        return view('staff.hibah.pengaturan.edit');
    })->name('s_hibah.pengaturan.edit');
    Route::get('pengaturan/show/1', function () {
        return view('staff.hibah.pengaturan.show');
    })->name('s_hibah.pengaturan.show');
    Route::get('pengaturan/show/1/1', function () {
        return view('staff.hibah.pengaturan.criteria');
    })->name('s_hibah.pengaturan.criteria');
});
