<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class VolunteerApplicationController extends Controller
{
    public function showVolunteerForm()
    {
        return view('volunteer.application')->with('auth', Auth::check());
    }

    public function submitApplication(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'birthdate' => 'required|date',
            'gender' => 'required|string|in:Masculino,Femenino,Otro',
            'phone' => 'required|regex:/^[0-9]{10}$/',
            'education' => 'required|string|in:Sin educación formal,Primaria,Secundaria,Preparatoria,Educación superior,Otro',
            'address' => 'required|string|max:255',
            'ine_document' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Obtener el usuario autenticado
        $user = Auth::user();

        if (!$user) {
            return redirect()->back()->withErrors(['auth' => 'Debes iniciar sesión para enviar tu solicitud.']);
        }

        // Verificar si el usuario ya tiene una solicitud
        $existingApplication = Volunteer::where('user_id', $user->id)->first();

        if ($existingApplication) {
            return redirect()->back()->withErrors(['application' => 'Ya has enviado una solicitud de voluntariado.']);
        }

        // Procesar y mover el archivo INE/DNI
        $ineDocument = $request->file('ine_document');
        $fileName = Str::random(10) . '_' . $ineDocument->getClientOriginalName();
        $filePath = 'img/ine_images/' . $fileName;

        $ineDocument->move(public_path('img/ine_images'), $fileName);

        // Crear un nuevo registro en la tabla 'volunteers'
        Volunteer::create([
            'user_id' => $user->id,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'education' => $request->education,
            'address' => $request->address,
            'ine_document' => $filePath,
            'status' => 2, // Status inicial
        ]);

        return redirect('/')->with('message', 'Tu solicitud se ha enviado correctamente.');
    }
}
