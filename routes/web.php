<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Login_registerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

Route::get('/activities', function () {
    return view('activities');
});

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

// Ruta para redirigir a Facebook
Route::get('/facebook-auth/redirect', function () {
    session()->regenerate();
    return Socialite::driver('facebook')->redirect();
});

// Ruta para manejar la respuesta de Facebook
Route::get('/facebook-auth/callback', function () {
    dd(session()->all()); // Verifica si la sesión tiene datos
    $user = Socialite::driver('facebook')->user();
    
    // Verificar si el usuario ya existe en la base de datos
    $userData = User::where('email', $user->getEmail())->first();
    if ($userData) {
        Auth::login($userData, true);
        return redirect('/');
    } else {
        // Crear un nuevo usuario si no existe
        $userData = User::updateOrCreate([
            'email' => $user->getEmail(),
        ], [
            'name' => $user->user['name'], // Acceder al nombre
            'password' => bcrypt('password'), // Se puede usar una contraseña por defecto
            'rol' => 'user',
            'status' => 1,
        ]);

        Auth::login($userData, true);
        return redirect('/');
    }
});
