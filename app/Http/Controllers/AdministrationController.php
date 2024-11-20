<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Donations;

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

        // Pasar los datos a la vista
        return view('dashboard/administration', compact('totalUsers', 'totalVolunteers', 'totalBeneficiaries', 'totalAmountRaised'));
    }
}