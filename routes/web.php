<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Login_registerController;
use App\Http\Controllers\ProgramsController;
use App\Http\Controllers\AdministrationController;
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

//Ruta para el chat



//Rutas para el Admin
Route::get('/administration/analysis', [AdministrationController::class, 'index'])->name('administration');

Route::get('/configuration/myaccount', function(){
    return view('dashboard/profile');
});

Route::get('/usuario/programas', function(){
    return view('dashboard/programs_register');
});

Route::get('/admin/gestion_de_usuarios', function(){
    return view('dashboard/user_management');
});

Route::get('/admin/solicitudes_de_usuarios', function(){
    return view('dashboard/user_requests');
});

Route::get('/admin/solicitudes_de_programas', function(){
    return view('dashboard/program_requests');
});

Route::get('/user/resumen_del_usuario', function(){
    return view('dashboard/user_summary');
});

Route::get('/usuario/mensajeria', function(){
    return view('dashboard/messaging');
});

Route::get('/admin/informes_de_donaciones', function(){
    return view('dashboard/donation_reports');
});

Route::get('/admin/asignacion_de_usuarios', function(){
    return view('dashboard/assigning_rol_to_requesting_user');
});

Route::get('/admin/asignación_de_recursos', function(){
    return view('dashboard/resource_allocation');
});
