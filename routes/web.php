<?php

use Illuminate\Support\Facades\Route;

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



    });

});



// frontend
Route::get('/', function () {
    return view('frontend/index');
});



