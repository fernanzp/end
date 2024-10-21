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
    //Procesar el inicio de sesión
    public function login(Request $request){
        //Validar los datos del formulario
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        //Ejecutar el inicio de sesión con los datos proporcionados
        $credentials = $request->only('email', 'password');

        //Si los datos son correctos, redirigir al usuario a la página principal
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return  redirect()->intended('/');
        }
        //Si los datos no son correctos, redirigir al usuario al login con un mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden.',
        ])->onlyInput('email');
    }
    
    //Mostrar la vista del registro o login
    public function login_register($login_register){
        return view('index.login_register', compact('login_register'));
    }

    //Cerrar la sesión del usuario
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
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
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => Hash::make(Str::random(24)),
                'role' => 'user',
                'google_id' => $user->getId(),
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