<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class ProgramsController extends Controller
{
    public function index()
    {
        $programs = Program::orderBy('id', 'desc')->take(9)->get();
        return view('programs', compact('programs'));
    }
}
