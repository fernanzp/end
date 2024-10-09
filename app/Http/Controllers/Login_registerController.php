<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\If_;
use Illuminate\Support\Facades\Auth;

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
}