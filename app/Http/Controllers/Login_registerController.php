<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\If_;
use Illuminate\Support\Facades\Auth;
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
    public function login_facebook(){
        $user = Socialite::driver('facebook')->user();
        #si este correo o id existe en la base de datos, entonces inicia sesión
        $userData = User::where('id_facebook', $user->getId())->first();
    
        if ($userData) {
            Auth::login($userData, true);
            return redirect('/dashboard');
        }else{
            $userData = User::updateOrCreate([
                'id_facebook' => $user->getId(),
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
}
