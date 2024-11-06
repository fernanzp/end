<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\If_;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class Login_registerController extends Controller
{
    //Mostrar la vista del login
    public function showLogin(){
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

    //Mostrar la vista del registro o login
    public function login_register($login_register){
        return view('login_register', compact('login_register'));
    }

    public function google_redirect(){
        return Socialite::driver('google')->redirect();
    }


    //función que maneja el inicio de sesion con google
    public function googleLogin(Request $request){
        //Obtener los datos del usuario de google
        $user = Socialite::driver('google')->user();
        //Buscar si el usuario ya existe en la base de datos
        $userDB = User::where('email', $user->getEmail())->first();
        //Si el usuario no existe, crearlo
        if(!$userDB){

            
            $userDB = User::create([
                'name' => $user->user['given_name'],
                'last_name' => $user->user['family_name'],
                'email' => $user->getEmail(),
                'password' => Hash::make(Str::random(24)),
                'rol' => 'user',
                'status' => 1,
                'google_id' => $user->getId(),
                'profile_img' =>$user->user['picture']
            ]);

            Auth::login($userDB, true);
            return redirect('/');
        }else{

            //pendiente poner un mensaje para vincular la cuenta de google
            //Si el usuario ya existe, iniciar sesión

            Auth::login($userDB, true);
            return redirect('/');
        }
    }
}