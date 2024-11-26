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
    
        // Verificar si se subió un archivo
        if ($request->hasFile('guardian_ine') && $request->file('guardian_ine')->isValid()) {
            // Obtener el archivo
            $file = $request->file('guardian_ine');
            
            // Generar un nombre único para el archivo (por ejemplo, basado en el timestamp y el nombre original)
            $fileName = time() . '_' . $file->getClientOriginalName();
    
            // Mover el archivo a la carpeta "public/img/ine_images"
            $file->move(public_path('img/ine_images'), $fileName);
    
            // Guardar la ruta del archivo en la base de datos
            $beneficiary->guardian_ine = 'img/ine_images/' . $fileName;
        }
    
        // Actualizar otros datos
        $beneficiary->update($request->only([
            'gender', 'phone', 'education_level', 'address', 'guardian_email', 'kinship'
        ]));
    
        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Datos adicionales guardados exitosamente.');
    }

    public function checkBeneficiary()
    {
        $beneficiary = Beneficiary::where('user_id', Auth::id())->first();
    
        if ($beneficiary) {
            $isFormComplete = $beneficiary->guardian_ine && $beneficiary->gender && $beneficiary->phone;
            $age = \Carbon\Carbon::parse($beneficiary->birthdate)->age;
            $isAdult = $age >= 18;
    
            if ($isFormComplete) {
                if ($beneficiary->status == 2) {
                    // Solicitud pendiente
                    $html = view('components.alert', [
                        'type' => 'info',
                        'title' => 'Solicitud pendiente.',
                        'message' => 'Hemos recibido su solicitud para ser beneficiario y está siendo procesada. Le notificaremos tan pronto como haya una resolución. Agradecemos su paciencia.',
                        'showModal' => true,
                    ])->render();
    
                    return response()->json(['exists' => true, 'status' => 'pending', 'html' => $html]);
                } elseif ($beneficiary->status == 1) {
                    // Solicitud aprobada
                    $html = view('components.alert', [
                        'type' => 'success',
                        'title' => 'Ya es beneficiario.',
                        'message' => 'Usted ya forma parte de nuestros beneficiarios. Le invitamos a revisar nuestros programas. Si tiene alguna duda, no dude en comunicarse con nuestros coordinadores.',
                        'showModal' => true,
                    ])->render();
    
                    return response()->json(['exists' => true, 'status' => 'approved', 'html' => $html]);
                }
            } else {
                // Formulario incompleto: abrir el segundo modal
                return response()->json([
                    'exists' => true,
                    'status' => 'incomplete',
                    'isAdult' => $isAdult,
                ]);
            }
        }
    
        // Sin registro de beneficiario: abrir el primer modal
        return response()->json(['exists' => false]);
    }
}