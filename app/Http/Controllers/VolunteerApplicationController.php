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

    // Manejo del archivo de INE
    $ineDocumentPath = 'uploads/ine_documents/' . time() . '_' . $request->file('ine_document')->getClientOriginalName();
    $request->file('ine_document')->move(public_path('uploads/ine_documents'), $ineDocumentPath);

    // Crear un nuevo registro de voluntario
    $volunteer = new Volunteer();
    $volunteer->user_id = auth()->user()->id;
    $volunteer->birthdate = $request->birthdate;
    $volunteer->gender = $request->gender;
    $volunteer->phone = $request->phone;
    $volunteer->education = $request->education;
    $volunteer->address = $request->address;
    $volunteer->ine_document = $ineDocumentPath;
    $volunteer->status = 2; // Cambiar el valor predeterminado de 0 a 2
    $volunteer->save();

    return redirect()->back()->with('success', 'Solicitud de voluntariado enviada correctamente.');
}

}
