<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Validation\ValidatesRequests;


use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
//require_once app_path('Http/Helpers/verify_recaptcha.blade.php');


class RegisterController extends Controller
{
    use ValidatesRequests;
    //Método para procesar el registro de usuarios
    public function register(Request $request)
    {
        Log::info('Datos recibidos del formulario: ', $request->all());
        //dd($request->all());  //Prueba
        //Validar los datos del formulario
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // Laravel espera que haya un campo 'password_confirmation'
            'recaptcha_token' => 'required',  //Validar el token del recaptcha
        ]);

            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify',[
                'secret' => env('6LcC1V0qAAAAACMcM2ohkp7-5cGquyD4Q6UEerZF'),
                'response' => $request->recaptcha_token,
            ]);

            $result = json_decode($response->body());
                //comprobacion del resultado de validacion del recaptcha
                if (!$result->success || $result->score < 0.5){
                     return back()->withErrors(['recaptcha' => 'Error de verificacion del reCAPTCHA']);
                }


        //Crear un nuevo usuario
        User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => 'user',
            'status' => 1,
        ]);

        // Redirigir o mostrar un mensaje de éxito
        return redirect()->route('login')->with('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
    }
}