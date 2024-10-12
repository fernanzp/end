<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Login_registerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('index');
});

//Ruta para el login
Route::get('/login', [Login_registerController::class, 'showLogin'])->name('login');

//Ruta para procesar los datos del inicio de sesión e iniciar sesión
Route::post('/login', [Login_registerController::class, 'login'])->name('login');

//Ruta dinámica para el login y register
Route::get('/{login_register}', [Login_registerController::class, 'login_register'])->where('login_register', 'login|register');

//Ruta para procesar los datos del register y crear un nuevo usuario
Route::post('/register', [RegisterController::class, 'register'])->name('register');

//Ruta para actividades
Route::get('/activities', function () {
    return view('activities');
});

//Ruta para donaciones
Route::get('/donations', function () {
    return view('donations');
});

//Ruta para el logout
Route::get('/logout', [Login_registerController::class, 'logout'])->name('logout');

//Ruta para redirigir a Google
Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-auth/callback', [Login_registerController::class, 'login_google']);

Route::get('/x-auth/redirect', function () {
    return Socialite::driver('x')->redirect();
});

Route::get('/x-auth/callback', [Login_registerController::class, 'login_x']);


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::post('/update-email', [UserController::class, 'updateEmail'])->name('user.updateEmail');
    Route::post('/update-lastname', [UserController::class, 'updateLastName'])->name('user.updateLastName');
});