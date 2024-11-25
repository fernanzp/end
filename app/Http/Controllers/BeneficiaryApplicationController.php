<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiary;
use Illuminate\Support\Facades\Auth;

class BeneficiaryApplicationController extends Controller
{
    public function store(Request $request)
    {
        // Verificar si el usuario ya tiene un registro de beneficiario
        $beneficiary = Beneficiary::where('user_id', Auth::id())->first();

        if ($beneficiary) {
            // Calcular edad y determinar si es adulto
            $age = \Carbon\Carbon::parse($beneficiary->birthdate)->age;
            $isAdult = $age >= 18;

            // Guardar el beneficiary_id en la sesión para que esté disponible en el formulario
            session(['beneficiary_id' => $beneficiary->id]);

            // Redirigir con datos de la sesión
            return redirect()->back()->with(['isAdult' => $isAdult, 'showModal' => true]);
        }

        // Validación de la fecha de nacimiento (solo si no existe el beneficiario)
        $request->validate([
            'birthdate' => 'required|date',
        ]);

        // Crear nuevo registro de beneficiario
        $beneficiary = Beneficiary::create([
            'user_id' => Auth::id(),
            'birthdate' => $request->birthdate,
            'status' => 2,
        ]);

        // Calcular edad y determinar si es adulto
        $age = \Carbon\Carbon::parse($request->birthdate)->age;
        $isAdult = $age >= 18;

        // Guardar el beneficiary_id en la sesión para que esté disponible en el formulario
        session(['beneficiary_id' => $beneficiary->id]);

        // Redirigir a la vista con la información de edad
        return redirect()->back()->with(['isAdult' => $isAdult, 'showModal' => true]);
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

    public function checkBeneficiary()
    {
        // Buscar el beneficiario del usuario
        $beneficiary = Beneficiary::where('user_id', Auth::id())->first();
    
        if ($beneficiary) {
            // Verificar si el beneficiario ha completado el segundo formulario
            $isFormComplete = $beneficiary->guardian_ine && $beneficiary->gender && $beneficiary->phone;
    
            // Calcular la edad
            $age = \Carbon\Carbon::parse($beneficiary->birthdate)->age;
            $isAdult = $age >= 18;
    
            // Si el formulario está completo, verificar el estado
            if ($isFormComplete) {
                if ($beneficiary->status == 2) {
                    // Estado pendiente
                    return response()->json([
                        'exists' => true, 
                        'status' => 'pending', 
                        'message' => 'Su solicitud para ser beneficiario está pendiente.',
                        'isAdult' => $isAdult
                    ]);
                } elseif ($beneficiary->status == 1) {
                    // Estado aprobado
                    return response()->json([
                        'exists' => true, 
                        'status' => 'approved', 
                        'message' => 'Ya es beneficiario.',
                        'isAdult' => $isAdult
                    ]);
                }
            } else {
                // Si el formulario no está completo, abrir el segundo modal
                return response()->json([
                    'exists' => true, 
                    'status' => 'incomplete', 
                    'message' => 'Por favor complete el segundo formulario para completar su solicitud.',
                    'isAdult' => $isAdult
                ]);
            }
        }
    
        // Si no existe un registro de beneficiario
        return response()->json(['exists' => false]);
    }
}