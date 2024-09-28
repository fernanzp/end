<?php

use App\Http\Controllers\Login_registerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/{login_register}', [Login_registerController::class, 'login_register'])
    ->where('login_register', 'login|register');