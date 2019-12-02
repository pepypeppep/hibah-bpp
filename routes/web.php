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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'dashboard', 'middleware' => ['role:member']], function () {
    Route::get('/', function () {
        return redirect()->route('hibah.daftar.index');
    });
    Route::get('daftar', 'Dashboard\HibahController@index')->name('hibah.daftar.index');
    Route::get('daftar/pengajuan/{slug}/create', 'Dashboard\PengajuanHibahController@create')->where('slug', '[\w\d\-\_]+')->name('hibah.daftar.create');
    Route::post('daftar/pengajuan/{id}/store', 'Dashboard\PengajuanHibahController@store')->name('hibah.daftar.pengajuan.store');
    Route::get('daftar/upload/{slug}/create', 'Dashboard\PengajuanHibahController@upload')->where('slug', '[\w\d\-\_]+')->name('hibah.daftar.upload');
    Route::post('daftar/upload/{id}/store', 'Dashboard\PengajuanHibahController@doUpload')->name('hibah.daftar.doupload');
    Route::get('daftar/berkas/{id}/delete', 'Dashboard\PengajuanHibahController@doDelete')->name('hibah.daftar.dodelete');
    Route::get('daftar/penguncian_data/{slug}', 'Dashboard\PengajuanHibahController@lock')->name('hibah.daftar.lock');
    Route::put('daftar/penguncian_data/{id}/lock', 'Dashboard\PengajuanHibahController@doLock')->name('hibah.daftar.doLock');

    Route::get('riwayat', 'Dashboard\PengajuanHibahController@index')->name('hibah.riwayat.index');
    Route::get('riwayat/{slug}/show', 'Dashboard\PengajuanHibahController@show')->where('slug', '[\w\d\-\_]+')->name('hibah.riwayat.show');
    Route::get('riwayat/{slug}/edit', 'Dashboard\PengajuanHibahController@edit')->where('slug', '[\w\d\-\_]+')->name('hibah.riwayat.edit');
    Route::put('riwayat/{id}/update', 'Dashboard\PengajuanHibahController@update')->name('hibah.riwayat.update');

    Route::get('review', 'AddReviewController@index')->name('hibah.review.index');
    Route::get('review/{slug}/show/{slug2}', 'AddReviewController@show')->name('hibah.review.show');
    Route::put('review/{slug}/update', 'AddReviewController@update')->name('hibah.review.update');

    Route::get('luaran', 'LuaranController@index')->name('hibah.luaran.index');
});


Route::group(['prefix' => 'staff', 'middleware' => ['role:staff']], function () {
    Route::get('/', function () {
        return redirect()->route('s_hibah.daftar.index');
    });

    Route::get('daftar', 'Staff\HibahController@index')->name('s_hibah.daftar.index');
    Route::get('daftar/{slug}/show', 'Staff\HibahController@show')->where('slug', '[\w\d\-\_]+')->name('s_hibah.daftar.show');
    Route::put('final/{id}/update', 'Staff\HibahController@update')->where('slug', '[\w\d\-\_]+')->name('s_hibah.daftar.update');

    Route::get('/pengaturan', 'Staff\HibahPengaturanController@index')->name('s_hibah.pengaturan.index');
    Route::get('/pengaturan/create', 'Staff\HibahPengaturanController@create')->name('s_hibah.pengaturan.create');
    Route::get('/pengaturan/{slug}/show', 'Staff\HibahPengaturanController@show')->where('slug', '[\w\d\-\_]+')->name('s_hibah.pengaturan.show');
    Route::get('/pengaturan/{slug}/edit', 'Staff\HibahPengaturanController@edit')->where('slug', '[\w\d\-\_]+')->name('s_hibah.pengaturan.edit');
    Route::post('/pengaturan/store', 'Staff\HibahPengaturanController@store')->name('s_hibah.pengaturan.store');
    Route::put('/pengaturan/{id}/update', 'Staff\HibahPengaturanController@update')->name('s_hibah.pengaturan.update');

    Route::get('pengaturan/{slug}/add_penilaian/{criteria}', 'Staff\KriteriaController@create')->where('slug', '[\w\d\-\_]+')->name('s_hibah.pengaturan.criteria');
    Route::post('pengaturan/{id}/add_penilaian/{criteria}/store', 'Staff\KriteriaController@store')->name('s_hibah.pengaturan.criteria.store');
    Route::get('pengaturan/update_penilaian/{slug}/edit', 'Staff\KriteriaController@edit')->where('slug', '[\w\d\-\_]+')->name('s_hibah.pengaturan.criteria.edit');
    Route::put('pengaturan/update_penilaian/{id}/update', 'Staff\KriteriaController@update')->name('s_hibah.pengaturan.criteria.update');
    Route::get('pengaturan/penilaian/{id}', 'Staff\KriteriaController@destroy')->name('s_hibah.pengaturan.criteria.delete');

    Route::post('reviewer/{id}/store', 'Staff\ReviewController@store')->name('s_hibah.review.store');
    Route::get('reviewer/{id}/delete', 'Staff\ReviewController@destroy')->name('s_hibah.review.delete');

    Route::get('luaran', 'LuaranController@index')->name('s_hibah.luaran.index');
});
