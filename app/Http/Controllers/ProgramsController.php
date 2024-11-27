<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class ProgramsController extends Controller
{
    public function index(Request $request)
    {
        // Obtener la categoría seleccionada desde la solicitud
        $category = $request->input('category');
        // Obtener el término de búsqueda desde la solicitud
        $search = $request->input('search'); 

        // Consultar programas, aplicando ambos filtros si están presentes
        $programs = Program::when($category, function ($query, $category) {
                return $query->where('category', $category);
            })
            ->when($search, function ($query, $search) {
                return $query->where('title', 'like', '%' . $search . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(9);

        // Pasar los datos a la vista
        return view('programs', compact('programs', 'category', 'search'));
    }

    public function recentPrograms($currentProgramId)
    {
        $recentPrograms = Program::where('id', '!=', $currentProgramId)
                                 ->orderBy('id', 'desc')
                                 ->take(3)
                                 ->get();
        return $recentPrograms;
    }

    public function show($id)
    {
        $program = Program::findOrFail($id);
        $recentPrograms = $this->recentPrograms($id);
        return view('program_view', compact('program', 'recentPrograms'));
    }
}
