<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class ProgramsController extends Controller
{
    public function index()
    {
        $programs = Program::orderBy('id', 'desc')->paginate(9);
        return view('programs', compact('programs'));
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
