<?php

namespace App\Http\Controllers;

use App\Models\Donations;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show_Dashboard(){
        
        $totalDonations = [
            'total' => Donations::count(),
            'totalAmount' => Donations::sum('amount')
        ];

        $users= [
            'total' => User::count(),
            'usuarios' => User::select('name', 'created_at', 'status')->get(),
        ];



        return view('dashboard.user.index', compact('totalDonations', 'users'));

    }
    

    public function showSolicitudes(){
        return view('dashboard.user.solicitudes');
    }

}
