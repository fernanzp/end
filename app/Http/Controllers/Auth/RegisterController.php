<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    use ValidatesRequests;
    //Método para procesar el registro de usuarios
    public function register(Request $request)
    {
        Log::info('Datos recibidos del formulario: ', $request->all());

        //Validar los datos del formulario
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'profile_img' => 'nullable|image|mimes:jpg,jpeg,png|max:8192',
            'password' => 'required|string|min:8|confirmed', // Laravel espera que haya un campo 'password_confirmation'
            'g-recaptcha-response' => 'required|string',
        ]);

        //obtiene el token del recaptcha
        $token = $request->input('g-recaptcha-response');
        $client = new Client();
        $secret = env('reCAPTCHA_secret');

        // Verifica el token con la API de Google
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => $secret,
                'response' => $token,
                'remoteip' => $request->ip(),
            ]
        ]);

        $responseBody = json_decode((string) $response->getBody(), true);

        //Imagen de perfil del usuario
        $profileImgPath = 'img/profile_images/default.jpg'; //Inicializamos la variable

        if($request->hasFile('profile_img')) {
            $file = $request->file('profile_img');
            $filename = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('img/profile_images'), $filename);
            $profileImgPath = 'img/profile_images/' . $filename;
        }

        Log::info('Datos para creación del usuario: ', [
            'name' => $request->name,
            'last_name' => $request->last_name,
            'profile_img' => $profileImgPath,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => 'user',
            'status' => 1,
        ]);        

        //Crear un nuevo usuario
        User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'profile_img' => $profileImgPath,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => 'user',
            'status' => 1,
        ]);

        //Redirigir o mostrar un mensaje de éxito
        return redirect()->route('login')->with('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
    }
}