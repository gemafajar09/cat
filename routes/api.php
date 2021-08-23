<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login-app','LoginController@loginApp');
Route::post('token-app','HomeController@tokenapp');
