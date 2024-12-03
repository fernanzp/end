<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramBeneficiary;
use App\Models\Beneficiary;
use App\Models\Program;
use Illuminate\Support\Facades\Auth;

class ProgramBeneficiaryController extends Controller
{
    public function store(Request $request, $programId)
    {
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'Por favor, inicia sesión para inscribirte.');
        }

        // Obtener el ID del usuario autenticado
        $userId = Auth::id();
    
        // Buscar al beneficiario asociado al usuario autenticado
        $beneficiary = Beneficiary::where('user_id', $userId)->first();
    
        if (!$beneficiary) {
            return redirect()->back()->with('alert', [
                'type' => 'info',
                'title' => 'Postúlate como beneficiario',
                'message' => 'Aún no formas parte de nuestra comunidad de beneficiarios. Envía tu solicitud y comienza a disfrutar de los beneficios que te ofrecemos. Si necesitas ayuda, comunícate con nuestros coordinadores.',
            ]);
        }

        // Buscar el programa
        $program = Program::findOrFail($programId);
    
        // Verificar si ya está inscrito en el programa
        $existingRegistration = ProgramBeneficiary::where('program_id', $programId)
            ->where('beneficiary_id', $beneficiary->id)
            ->first();

        if ($existingRegistration) {
            return redirect()->back()->with('alert', [
                'type' => 'info',
                'title' => '¡Ya formas parte de este programa!',
                'message' => 'Parece que ya te has inscrito previamente en el programa "' . $program->title . '". ¡Gracias por tu interés y participación!',
            ]);
        }
    
        // Crear el registro en program_beneficiaries
        ProgramBeneficiary::create([
            'program_id' => $programId,
            'beneficiary_id' => $beneficiary->id,
            'assigned_at' => now(),
        ]);
    
        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('alert', [
            'type' => 'success',
            'title' => '¡Estás dentro!',
            'message' => 'Te has inscrito exitosamente al programa "' . $program->title . '". ¡Gracias por participar!',
        ]);
    }
}
