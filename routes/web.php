<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Login_registerController;
use App\Http\Controllers\ProgramsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DashboardController;

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

Route::get('/donations', function () {
    return view('donations');
});

//Ruta para el logout
Route::get('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

//Ruta para cargar los datos de los programas
Route::get('/programs', [ProgramsController::class, 'index']);

//Ruta para el program view
Route::get('programs/programview/{id}', [ProgramsController::class, 'show'])->name('programview');

Route::post('/get-transactions', [DonationController::class, 'getTransactions'])->name('getTransactions');

Route::post('/get-transactionsAnonimo', [DonationController::class, 'getTransactionsAnonimo'])->name('getTransactionsAnonimo');

//Ruta para redirigir al login de google
Route::get('/google-auth/redirect', [Login_registerController::class, 'google_redirect'])->name('google.redirect');

//Ruta para procesar el inicio de sesión con google
Route::get('/google-auth/callback', [Login_registerController::class, 'googleLogin'])->name('google.login');

Route::get('/terms', function (){
        return view('terms');
}); 

Route::get('/privacy-policy', function (){
         return view('privacy-policy');
});