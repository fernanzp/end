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
        $users =  User::select('name', 'email', 'rol')->get();

        return view('dashboard.user.index', compact('totalDonations', 'users'));

    }
}
