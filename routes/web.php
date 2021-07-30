<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'LoginController@index');
Route::get('/daftar', 'LoginController@daftar')->name('daftar');
Route::post('/regis', 'LoginController@register')->name('regis');
Route::post('/login', 'LoginController@login')->name('login');

// home
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ujian-mulai', 'HomeController@mulaiujian')->name('ujian-mulai');
Route::get('/isisoal/{link}', 'HomeController@isisoal');
