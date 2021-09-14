<?php

use Illuminate\Support\Facades\Route;

// Frontend
Route::get('/', 'LoginController@index');
Route::get('/daftar', 'LoginController@daftar')->name('daftar');
Route::post('/regis', 'LoginController@register')->name('regis');
Route::post('/login', 'LoginController@login')->name('login');
Route::get('/keluar', 'LoginController@logout')->name('keluar');

// home
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/ujian-mulai', 'HomeController@mulaiujian')->name('ujian-mulai');
Route::get('/isisoal/{idsoal}/{idujian}', 'HomeController@isisoal');

// simpan ke tb_mulai_ujian_detail
Route::get('/listsoal/{kategori}/{soal}/{id_ujian}','HomeController@listsoal')->name('listsoal');
Route::post('/simpan-jawaban', 'HomeController@simpanJawaban')->name('simpanJawaban');
Route::post('/cek-jawaban', 'HomeController@cekJawaban')->name('cekJawaban');

// nilai skor ujian
Route::get('/nilai-skor/{idmulaiujian}', 'HomeController@nilaiskor')->name('nilai-skor');

// Backend
Route::prefix('cat-admin')->group(function () {

    Route::middleware(['belum_login'])->group(function () {
        Route::get('/', 'Backend\DashboardController@index')->name('/');
        Route::post('/aksilogin', 'Backend\DashboardController@loginAdmin')->name('aksilogin');
        Route::get('/register', 'Backend\DashboardController@register')->name('register');
        Route::post('/aksiregister', 'Backend\DashboardController@registerAdmin')->name('aksiregister');
    });
    
    Route::middleware(['sudah_login'])->group(function () {
        Route::get('/dashboard', 'Backend\DashboardController@dashboard')->name('dashboard');
        Route::get('/logout', 'Backend\DashboardController@logout')->name('logout');

        // admin
        Route::get('/admin', 'Backend\AdminController@index')->name('admin');
        Route::get('/admin/create', 'Backend\AdminController@create')->name('admin.create');
        Route::post('/admin', 'Backend\AdminController@store')->name('admin.store');
        Route::get('/admin/{admin}', 'Backend\AdminController@edit')->name('admin.edit');
        Route::put('/admin/{admin}', 'Backend\AdminController@update')->name('admin.update');
        Route::delete('/admin/{admin}', 'Backend\AdminController@destroy')->name('admin.delete');
        
        // kategori soal
        Route::get('/kategori-soal', 'Backend\KategoriSoalController@index')->name('kategori-soal');
        Route::get('/kategori-soal/create', 'Backend\KategoriSoalController@create')->name('kategori-soal.create');
        Route::post('/kategori-soal', 'Backend\KategoriSoalController@store')->name('kategori-soal.store');
        Route::get('/kategori-soal/{kategori_soal}', 'Backend\KategoriSoalController@edit')->name('kategori-soal.edit');
        Route::put('/kategori-soal/{kategori_soal}', 'Backend\KategoriSoalController@update')->name('kategori-soal.update');
        Route::delete('/kategori-soal/{kategori_soal}', 'Backend\KategoriSoalController@destroy')->name('kategori-soal.delete');
        
        // mapel
        Route::get('/mata-pelajaran', 'Backend\MapelController@index')->name('mapel');
        Route::get('/mata-pelajaran/create', 'Backend\MapelController@create')->name('mapel.create');
        Route::post('/mata-pelajaran', 'Backend\MapelController@store')->name('mapel.store');
        Route::get('/mata-pelajaran/{mapel}', 'Backend\MapelController@edit')->name('mapel.edit');
        Route::put('/mata-pelajaran/{mapel}', 'Backend\MapelController@update')->name('mapel.update');
        Route::delete('/mata-pelajaran/{mapel}', 'Backend\MapelController@destroy')->name('mapel.delete');
        
        // submapel
        Route::get('/sub-mata-pelajaran', 'Backend\SubmapelController@index')->name('submapel');
        Route::get('/sub-mata-pelajaran/create', 'Backend\SubmapelController@create')->name('submapel.create');
        Route::post('/sub-mata-pelajaran', 'Backend\SubmapelController@store')->name('submapel.store');
        Route::get('/sub-mata-pelajaran/{submapel}', 'Backend\SubmapelController@edit')->name('submapel.edit');
        Route::put('/sub-mata-pelajaran/{submapel}', 'Backend\SubmapelController@update')->name('submapel.update');
        Route::delete('/sub-mata-pelajaran/{submapel}', 'Backend\SubmapelController@destroy')->name('submapel.delete');
        
        // master soal
        Route::get('/soal', 'Backend\SoalController@index')->name('soal');
        Route::get('/soal/create/{id}', 'Backend\SoalController@create')->name('soal.create');
        Route::post('/soal', 'Backend\SoalController@store')->name('soal.store');
        Route::get('/soal/{soal}', 'Backend\SoalController@edit')->name('soal.edit');
        Route::put('/soal/{soal}', 'Backend\SoalController@update')->name('soal.update');
        Route::delete('/soal/{soal}', 'Backend\SoalController@destroy')->name('soal.delete');


        // soal berdasarkan kategori
        Route::get('/soal/kategori/{soal}', 'Backend\SoalController@soalKategori')->name('soal.kategori');
        // api soal berdasarkan kategori
        Route::get('soal/kategori-detail/{soal}', 'Backend\SoalController@apiSoalKategori')->name('soal.listSoalKategori');
        
        
        // soal berdasarkan submapel
        Route::get('/soal/sub-mata-pelajaran/{soal}', 'Backend\SoalController@soalSubmapel')->name('soal.submapel');
        // api soal berdasarkan submapel
        Route::get('soal/sub-mata-pelajaran-detail/{soal}', 'Backend\SoalController@apiSoalSubmapel')->name('soal.listSoalSubmapel');
        Route::post('soal/sub-mata-pelajaran-cari', 'Backend\SoalController@apiSoalSubmapelCari')->name('soal.cariSubmapel');

        // import soal
        Route::post('soal/import', 'Backend\SoalController@importSoal')->name('soal.import');
        
        // Token
        Route::get('/token', 'Backend\TokenController@index')->name('token');
        Route::get('/token/create', 'Backend\TokenController@create')->name('token.create');
        Route::post('/token', 'Backend\TokenController@store')->name('token.store');
        Route::get('/token/{token}', 'Backend\TokenController@edit')->name('token.edit');
        Route::put('/token/{token}', 'Backend\TokenController@update')->name('token.update');
        Route::delete('/token/{token}', 'Backend\TokenController@destroy')->name('token.delete');
        
        // Setting Soal
        Route::post('/setting-soal', 'Backend\SettingSoalController@store')->name('setting-soal.store');
        Route::get('/setting-soal/{id}', 'Backend\SettingSoalController@edit')->name('setting-soal.edit');
        
        // User
        Route::get('/user', 'Backend\UserController@index')->name('user');
        Route::get('/user/create', 'Backend\UserController@create')->name('user.create');
        Route::post('/user', 'Backend\UserController@store')->name('user.store');
        Route::get('/user/{user}', 'Backend\UserController@edit')->name('user.edit');
        Route::put('/user/{user}', 'Backend\UserController@update')->name('user.update');
        Route::delete('/user/{user}', 'Backend\UserController@destroy')->name('user.delete');

    });

});
