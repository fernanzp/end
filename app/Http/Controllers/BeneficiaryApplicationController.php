<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiary;
use Illuminate\Support\Facades\Auth;

class BeneficiaryApplicationController extends Controller
{
    public function store(Request $request)
    {
        // Validación de la fecha de nacimiento
        $request->validate([
            'birthdate' => 'required|date',
        ]);

        // Guardar la fecha de nacimiento
        $beneficiary = Beneficiary::create([
            'user_id' => Auth::id(),
            'birthdate' => $request->birthdate,
            'status' => 2,
        ]);

        // Calcular si es mayor de edad
        $age = \Carbon\Carbon::parse($request->birthdate)->age;
        $isAdult = $age >= 18;

        // Redirigir a la vista con la información de edad
        return redirect()->back()->with(['isAdult' => $isAdult, 'beneficiary_id' => $beneficiary->id,])->with('showModal', true);
    }

    public function update(Request $request)
    {
        $beneficiary = Beneficiary::findOrFail($request->beneficiary_id);

        // Actualizar los datos adicionales
        $beneficiary->update($request->only([
            'gender', 'phone', 'education_level', 'address', 'guardian_email', 'guardian_ine', 'kinship'
        ]));

        return redirect()->back()->with('success', 'Datos adicionales guardados exitosamente.');
    }
}