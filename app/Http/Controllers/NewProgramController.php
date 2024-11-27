<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NewProgramController extends Controller
{
    public function store(Request $request)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'description' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'place' => 'nullable|string|max:255',
            'modality' => 'required|in:presencial,virtual',
            'days_of_the_week' => 'nullable|array',
            'schedule' => 'nullable|string|max:255',
            'age' => 'nullable|string|max:255',
            'min_age' => 'nullable|integer',
            'max_age' => 'nullable|integer',
            'beneficiary_capacity' => 'nullable|integer',
            'volunteer_capacity' => 'nullable|integer',
            'objetive' => 'required|string',
            'financing' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'start_date' => 'required_if:event_duration,multiple_days|date|after_or_equal:today',
            'end_date' => 'required_if:event_duration,multiple_days|date|after_or_equal:start_date',
            'date' => 'required_if:event_duration,single_day|date|after_or_equal:today',
            'start_time' => 'nullable|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i',
            'category' => 'required|in:educativo,economico,caritativo,inclusivo,capacitacion,otro', // Validación para categoría
        ]);


         // Procesar los datos de los contenidos
            $validatedData['contents'] = json_encode($request->input('contents', [])); // Convertir a JSON
        // Lógica para manejar un solo día vs varios días
        if ($request->input('event_duration') == 'single_day') {
            $validatedData['start_date'] = $request->input('date');
            $validatedData['end_date'] = null;
        } else {
            $validatedData['start_date'] = $request->input('start_date');
            $validatedData['end_date'] = $request->input('end_date');
        }

        // Concatenar la hora de inicio y la hora de fin
        if ($request->input('start_time') && $request->input('end_time')) {
            if ($request->input('end_time') <= $request->input('start_time')) {
                return redirect()->back()->withErrors('La hora de fin debe ser posterior a la hora de inicio.');
            }
            $validatedData['schedule'] = $request->input('start_time') . '-' . $request->input('end_time');
        }

        // Concatenar el rango de edades
        if ($request->input('min_age') && $request->input('max_age')) {
            $validatedData['age'] = $request->input('min_age') . ' - ' . $request->input('max_age');
        } else {
            $validatedData['age'] = null;
        }

        // Guardar el archivo de imagen si se proporciona
        if ($request->hasFile('img')) {
            $validatedData['img'] = $request->file('img')->store('images', 'public');
        }

        // Convertir los días de la semana a JSON
        $validatedData['days_of_the_week'] = json_encode($validatedData['days_of_the_week'] ?? []);

        // Validar si la modalidad es "presencial" y asignar coordenadas de latitud y longitud
        if ($request->input('modality') == 'presencial') {
            $validatedData['latitude'] = $request->input('latitude');
            $validatedData['longitude'] = $request->input('longitude');
        } else {
            // Si no es presencial, asegurarse de que las coordenadas se guarden como null
            $validatedData['latitude'] = null;
            $validatedData['longitude'] = null;
        }

        // Crear un nuevo programa con los datos validados
        Program::create($validatedData);

        return redirect()->back()->with('success', 'Programa creado con éxito');
    }
}
