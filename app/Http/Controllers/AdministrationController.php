<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Donations;
use App\Models\Program;
use Illuminate\Support\Carbon;

class AdministrationController extends Controller
{
    public function index()
    {
        // Contar todos los usuarios
        $totalUsers = User::count();

        // Contar usuarios con rol 'volunteer'
        $totalVolunteers = User::where('rol', 'volunteer')->count();

        // Contar usuarios con rol 'beneficiary'
        $totalBeneficiaries = User::where('rol', 'beneficiary')->count();


        //Calcular el monto total recaudado
        $totalAmountRaised = Donations::sum('amount');


        // --- Lógica para la gráfica de usuarios semanal ---
        $weeklyRegistrations = User::selectRaw('DAYOFWEEK(created_at) as day, rol, COUNT(*) as count')
            ->where('created_at', '>=', Carbon::now()->subDays(6))
            ->groupBy('day', 'rol')
            ->get();

        // Inicializar datos para los últimos 7 días
        $weeklyData = [
            'user' => array_fill(0, 7, 0),
            'volunteer' => array_fill(0, 7, 0),
            'beneficiary' => array_fill(0, 7, 0),
        ];

        // Calcular el índice del día actual y ajustar para que sea el último día en la gráfica
        $currentDayIndex = (Carbon::now()->dayOfWeekIso + 1) % 7;

        // Asignar los datos a los días correspondientes
        foreach ($weeklyRegistrations as $registration) {
            $dayIndex = ($registration->day - 1 - $currentDayIndex + 7) % 7;

            switch ($registration->rol) {
                case 'user':
                    $weeklyData['user'][$dayIndex] = $registration->count;
                    break;
                case 'volunteer':
                    $weeklyData['volunteer'][$dayIndex] = $registration->count;
                    break;
                case 'beneficiary':
                    $weeklyData['beneficiary'][$dayIndex] = $registration->count;
                    break;
            }
        }

        // --- Lógica para la gráfica de usuarios anual ---
        $currentMonth = Carbon::now()->month;

        $yearlyRegistrations = User::selectRaw('MONTH(created_at) as month, rol, COUNT(*) as count')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month', 'rol')
            ->get();

        $yearlyData = [
            'user' => array_fill(0, 12, 0),
            'volunteer' => array_fill(0, 12, 0),
            'beneficiary' => array_fill(0, 12, 0),
        ];

        // Asignar los datos a los meses correspondientes
        foreach ($yearlyRegistrations as $registration) {
            $monthIndex = ($registration->month - 1 - $currentMonth + 12) % 12;

            switch ($registration->rol) {
                case 'user':
                    $yearlyData['user'][$monthIndex] = $registration->count;
                    break;
                case 'volunteer':
                    $yearlyData['volunteer'][$monthIndex] = $registration->count;
                    break;
                case 'beneficiary':
                    $yearlyData['beneficiary'][$monthIndex] = $registration->count;
                    break;
            }
        }

        // Obtener el total de programas y el conteo de cada categoría
        $totalPrograms = \App\Models\Program::count();
        $categories = ['educativo', 'económico', 'caritativo', 'inclusivo', 'capacitación', 'otro'];
        
        $categoryData = [];
        foreach ($categories as $category) {
            $count = \App\Models\Program::where('category', $category)->count();
            $percentage = $totalPrograms > 0 ? ($count / $totalPrograms) * 100 : 0;
            $categoryData[] = round($percentage, 2); // Redondeamos a 2 decimales
        }

        // Obtener los 3 usuarios más recientes
        $recentUsers = User::orderBy('created_at', 'desc')->take(3)->get();

        // Obtener los 3 programas más recientes
        $recentPrograms = Program::orderBy('created_at', 'desc')->take(3)->get();

        // Obtener las 3 donaciones más recientes con datos del usuario
        $recentDonations = Donations::with('user')->orderBy('created_at', 'desc')->take(3)->get();

        // Pasar ambas series de datos a la vista
        $data = [
            'weekly' => $weeklyData,
            'yearly' => $yearlyData
        ];


        // Pasar los datos a la vista
        return view('dashboard/administration', compact('totalUsers', 'totalVolunteers', 'totalBeneficiaries', 'totalAmountRaised', 'data', 'categoryData', 'recentDonations', 'recentUsers', 'recentPrograms'));
    }
}