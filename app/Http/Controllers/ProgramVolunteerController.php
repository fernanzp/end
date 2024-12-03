<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramVolunteer;
use App\Models\Volunteer;
use App\Models\Program;
use Illuminate\Support\Facades\Auth;

class ProgramVolunteerController extends Controller
{
    public function store(Request $request, $programId)
    {
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'Por favor, inicia sesión para inscribirte.');
        }

        // Obtener el ID del usuario autenticado
        $userId = Auth::id();

        // Buscar al voluntario asociado al usuario autenticado
        $volunteer = Volunteer::where('user_id', $userId)->first();

        if (!$volunteer) {
            return redirect()->back()->with('alert', [
                'type' => 'info',
                'title' => 'Postúlate como voluntario',
                'message' => 'Aún no formas parte de nuestra comunidad de voluntarios. Envía tu solicitud y comienza a disfrutar de los beneficios que te ofrecemos. Si necesitas ayuda, comunícate con nuestros coordinadores.',
            ]);
        }

        // Buscar el programa
        $program = Program::findOrFail($programId);

        // Verificar si ya está inscrito en el programa
        $existingRegistration = ProgramVolunteer::where('program_id', $programId)
        ->where('volunteer_id', $volunteer->id)
        ->first();

        if ($existingRegistration) {
            return redirect()->back()->with('alert', [
                'type' => 'info',
                'title' => '¡Ya formas parte de este programa!',
                'message' => 'Parece que ya te has inscrito previamente en el programa "' . $program->title . '". ¡Gracias por tu interés y participación!',
            ]);
        }

        // Crear el registro en program_beneficiaries
        ProgramVolunteer::create([
        'program_id' => $programId,
        'volunteer_id' => $volunteer->id,
        'assigned_at' => now(),
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('alert', [
            'type' => 'success',
            'title' => '¡Estás dentro!',
            'message' => 'Gracias por inscribirte al programa "' . $program->title . '". Estamos encantados de que formes parte de esta iniciativa.',
        ]);
    }
}
