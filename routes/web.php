<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Login_registerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DonacionController;

//Ruta para la página principal
Route::get('/', [RoutesController::class, 'showIndex']);

//Ruta para el login
Route::get('/login', [RoutesController::class, 'showLogin'])->name('login');

//Ruta para mostrar la página de actividades
Route::get('/activities', [RoutesController::class, 'showActivities']);

//Ruta para mostrar la página de donaciones
Route::get('/donations', [RoutesController::class, 'showDonations']);






//Ruta para procesar los datos del inicio de sesión e iniciar sesión
Route::post('/login', [Login_registerController::class, 'login'])->name('login');

//Ruta dinámica para el login y register
Route::get('/{login_register}', [Login_registerController::class, 'login_register'])
    ->where('login_register', 'login|register');

//Ruta para procesar los datos del register y crear un nuevo usuario
Route::post('/register', [RegisterController::class, 'register'])->name('register');

//Ruta para el logout
Route::get('/logout', [Login_registerController::class, 'logout'])->name('logout');


//Ruta para redirigir al login de google
Route::get('/google-auth/redirect', [Login_registerController::class, 'google_redirect'])->name('google.redirect');

//Ruta para procesar el inicio de sesión con google
Route::get('/google-auth/callback', [Login_registerController::class, 'googleLogin'])->name('google.login');




Route::post('/guardar-transaccion', [DonacionController::class, 'guardarTransaccion']);

//Ruta del dashboard, se redirige a su pagina correspondiente dependiendo del rol
Route::get('/dashboard', [DashboardController::class, 'show_Dashboard'])->name('dashboard');

//Ruta para mostrar la página de solicitudes
Route::get('/dashboard/solicitudes', [DashboardController::class, 'showSolicitudes']);