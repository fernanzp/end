<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewProgram extends Controller
{
    public function CreateNewProgram(Request $request)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'place' => 'nullable|string|max:255',
            'modality' => 'required|in:presencial,en línea',
            'days_of_the_week' => 'nullable|array',
            'schedule' => 'nullable|string|max:255',
            'age' => 'nullable|string|max:255',
            'beneficiary_capacity' => 'nullable|integer',
            'volunteer_capacity' => 'nullable|integer',
            'objetive' => 'required|string',
            'financing' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Guardar el archivo de imagen si se proporciona
        if ($request->hasFile('img')) {
            $validatedData['img'] = $request->file('img')->store('images', 'public');
        }

        // Convertir los días de la semana a JSON
        $validatedData['days_of_the_week'] = json_encode($validatedData['days_of_the_week'] ?? []);

        // Crear un nuevo programa
        Program::create($validatedData);

        return redirect()->back()->with('success', 'Programa creado con éxito');
    }
}
