<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\If_;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class Login_registerController extends Controller
{
    //Mostrar la vista del login si no está autenticado
    public function showLogin(){
        if (Auth::check()){
            return redirect('/dashboard');
        }
        return view('login_register', ['login_register' => 'login']);
    }

    //Procesar el inicio de sesión
    public function login(Request $request){
        //Validar los datos del formulario
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        //Ejecutar el inicio de sesión con los datos proporcionados
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return  redirect()->intended('/');
        }
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden.',
        ])->onlyInput('email');
    }

    //funcion que cierra la sesión
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    #funcion que maneja el inicio de sesión con google
    public function login_x(){
        $user = Socialite::driver('x')->user();
    
        #si este correo o id existe en la base de datos, entonces inicia sesión
        $userData = User::where('id_x', $user->getId())->first();
    
        if ($userData) {
            Auth::login($userData, true);
            return redirect('/dashboard');
        }else{
            $userData = User::updateOrCreate([
                'id_x' => $user->getId(),
            ], [
                'name' => $user->getName(),
                'last_name' => '',
                'email' => $user->getEmail(),
                'password' => bcrypt('password'),
                'rol' => 'user',
                'status' => 1,
            ]);
        
            Auth::login($userData, true);
        
            return redirect('/dashboard');
        }
    }

    public function login_google(){
        $user = Socialite::driver('google')->user();
    
        # Verificar si el correo ya está en uso
    $emailInUse = User::where('email', $user->getEmail())->first();

    if ($emailInUse && $emailInUse->id_google != $user->getId()) {
        # Si el correo ya está en uso pero con otra cuenta de Google
        return redirect('/login')->withErrors(['email' => 'Este correo está relacionado con otra cuenta.']);
    }


    #si este correo existe en la base de datos, entonces inicia sesión
    $userData = User::where('id_google', $user->getId())->first();
    
    if ($userData) {
        Auth::login($userData, true);
        return redirect('/dashboard');
    }else{
        $userData = User::updateOrCreate([
            'id_google' => $user->getId(),
        ], [
            'name' => $user->user['given_name'], // Acceder al name
            'last_name' => $user->user['family_name'], // Acceder al family_name
            'email' => $user->getEmail(),
            'password' => bcrypt('password'),
            'rol' => 'user',
            'status' => 1,
        ]);
    
        Auth::login($userData, true);
    
        return redirect('/dashboard');
    }
    }

    //Mostrar la vista del registro o login
    public function login_register($login_register){
        return view('login_register', compact('login_register'));
    }
}