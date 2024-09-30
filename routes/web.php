<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Login_registerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/{login_register}', [Login_registerController::class, 'login_register'])
    ->where('login_register', 'login|register');

//Ruta para procesar los datos del register y crear un nuevo usuario
Route::post('/register', [RegisterController::class, 'register'])->name('register');