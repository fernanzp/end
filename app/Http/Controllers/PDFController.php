<?php

namespace App\Http\Controllers;

use App\Models\ProgramasEducativos\ProgramaEducativo;
use Barryvdh\DomPDF\Facade\Pdf;  // Ajustar la referencia a la clase PDF
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generarPDF()
    {
        // Obtener los programas educativos con sus voluntarios
        $programas = ProgramaEducativo::with(['voluntario.trabajador.usuario'])
            ->select('nombre_programa', 'estado', 'fecha_inicio', 'fecha_termino')
            ->get();

        // Título para el PDF
        $titulo = 'Programas Educativos';

        // Cargar la vista para el PDF
        $pdf = Pdf::loadView('pdf.reporte', compact('programas', 'titulo'));

        // Devolver el PDF como descarga
        return $pdf->download('programas_educativos.pdf');
    }
}