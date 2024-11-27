<?php

namespace App\Http\Controllers;

use App\Models\ProgramasEducativos\ProgramaEducativo;
use Barryvdh\DomPDF\Facade\Pdf;  // Ajustar la referencia a la clase PDF
use Illuminate\Http\Request;
use App\Models\Donations;
use App\Models\User;
use App\Models\Program;

class PDFController extends Controller
{
    // public function generarPDF()
    // {
    //     // Obtener los programas educativos con sus voluntarios
    //     $programas = ProgramaEducativo::with(['voluntario.trabajador.usuario'])
    //         ->select('nombre_programa', 'estado', 'fecha_inicio', 'fecha_termino')
    //         ->get();

    //     // Título para el PDF
    //     $titulo = 'Programas Educativos';

    //     // Cargar la vista para el PDF
    //     $pdf = Pdf::loadView('pdf.reporte', compact('programas', 'titulo'));

    //     // Devolver el PDF como descarga
    //     return $pdf->download('programas_educativos.pdf');

    // }

    public function reportePDF()
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
    }


}