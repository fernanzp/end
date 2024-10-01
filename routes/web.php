<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Login_registerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

//Ruta para el login
Route::get('/login', [Login_registerController::class, 'showLogin'])->name('login');

//Ruta para procesar los datos del inicio de sesión e iniciar sesión
Route::post('/login', [Login_registerController::class, 'login'])->name('login');

//Ruta dinámica para el login y register
Route::get('/{login_register}', [Login_registerController::class, 'login_register'])
    ->where('login_register', 'login|register');

//Ruta para procesar los datos del register y crear un nuevo usuario
Route::post('/register', [RegisterController::class, 'register'])->name('register');

/* Ruta para el logout
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');*/