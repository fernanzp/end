<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donations;
use App\Models\User;
use App\Models\Program;

class Pdf extends Controller
{
    public function Pdf()
    {

        $data = [
            'total_donations' => Donations::sum('amount'),
            'total_users' => User::count(),
            'total_beneficiaries' => User::where('rol', 'beneficiary')->count(),
            'total_volunteers' => User::where('rol', 'volunteer')->count(),
            'total_programs' => Program::count(),
            'programs' => Program::all()
        ];

        $pdf = PDF::loadView('reporte.Pdf', $data);
        return $pdf->download('reporte.pdf');


        // obten el total de donaciones
        $total_donations = Donations::sum('amount');
        // obten el total de usuarios registrados
        $total_users = User::count();
        // obten el total de usuarios con el rol de beneficiario
        $total_beneficiaries = User::where('rol', 'beneficiary')->count();
        // obten el total de usuarios con el rol de voluntario
        $total_volunteers = User::where('rol', 'volunteer')->count();
        // obten el total de programas creados
        $total_programs = Program::count();
        // obten loa programas creados
        $programs = Program::all();

        return view('reporte.Pdf', compact('programs','total_donations', 'total_users', 'total_beneficiaries', 'total_volunteers', 'total_programs'));
    }
}
