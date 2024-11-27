<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Login_registerController;
use App\Http\Controllers\ProgramsController;
use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BeneficiaryApplicationController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UsersRequestController;
use App\Http\Controllers\ConfigurationProgramsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewProgramController;
use App\Http\Controllers\VolunteerApplicationController;

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

// Ruta para guardar la fecha de nacimiento del beneficiario
Route::post('/beneficiaryapplication', [BeneficiaryApplicationController::class, 'store'])->middleware('auth')->name('beneficiary.store');
// Ruta para guardar los demás datos del beneficiario
Route::post('/beneficiary/update', [BeneficiaryApplicationController::class, 'update'])->name('beneficiary.update');
// Ruta para verificar si el beneficiario ya ha ingresado su fecha de nacimiento
Route::get('/check-beneficiary', [BeneficiaryApplicationController::class, 'checkBeneficiary'])->name('check.beneficiary');

Route::get('/terms', function (){
    return view('terms');
}); 

Route::get('/privacy-policy', function (){
    return view('privacy-policy');
});

//Ruta para el chat



//Rutas para el Admin
Route::get('/administration/analysis', [AdministrationController::class, 'index'])->name('administration');

Route::get('/configuration/myaccount', [ProfileController::class, 'index'])->name('profile.index');
Route::post('/configuration/myaccount/update', [ProfileController::class, 'update'])->name('profile.update');
Route::post('/configuration/myaccount/update-image', [ProfileController::class, 'updateImage'])->name('profile.updateImage');

Route::get('/configuration/programs', [ConfigurationProgramsController::class, 'index']);
//Ruta para crear un nuevo programa
Route::post('/configuration/programs/store', [NewProgramController::class, 'store'])->name('programs.store');

Route::get('/admin/gestion_de_usuarios', function(){
    return view('dashboard/user_management');
});

//Rutas para aceptar, rechazar o ver la información de las solicitudes de usuarios
Route::get('/usersrequests', [UsersRequestController::class, 'index'])->name('requests.index');
Route::post('/aprobar-solicitud', [UsersRequestController::class, 'aprobarSolicitud'])->name('aprobar.solicitud');
Route::post('/rechazar-solicitud', [UsersRequestController::class, 'rechazarSolicitud'])->name('rechazar.solicitud');
Route::get('/user/request-info/{user_id}/{rol}', [UsersRequestController::class, 'getRequestInfo'])->name('user.request-info');

Route::get('/admin/solicitudes_de_programas', function(){
    return view('dashboard/program_requests');
});

Route::get('/user/resumen_del_usuario', function(){
    return view('dashboard/user_summary');
});

Route::get('/usuario/mensajeria',[ChatController::class, 'index'])->name('messaging');
Route::post('usuario/users/search', [ChatController::class, 'search'])->name('chat.search');
Route::get('usuario/users/fetch-messages', [ChatController::class, 'fetchMessages'])->name('chat.fetchMessages');
Route::get('usuario/chat/{user}', [ChatController::class, 'showChat'])->name('chat.show');
Route::post('usuario/chat/get-messages', [ChatController::class, 'getMessages'])->name('chat.getMessages');
Route::post('usuario/chat/send-message', [ChatController::class, 'sendMessage'])->name('chat.sendMessage');

Route::get('/admin/informes_de_donaciones', function(){
    return view('dashboard/donation_reports');
});

Route::get('/admin/asignacion_de_usuarios', function(){
    return view('dashboard/assigning_rol_to_requesting_user');
});

Route::get('/admin/asignación_de_recursos', function(){
    return view('dashboard/resource_allocation');
});

// Ruta para procesar la solicitud de voluntariado
Route::post('/volunteer/submit', [VolunteerApplicationController::class, 'submitApplication'])->name('volunteer.submit');