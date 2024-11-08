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

    public function show($id)
    {
        $program = Program::findOrFail($id);
        return view('program_view', compact('program'));
    }
}
