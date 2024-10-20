<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutesController extends Controller
{

    //Mostrar la vista principal
    public function showIndex(){
        return view('index.index');
    }

    //Mostrar la vista del login
    public function showLogin(){
        return view('index.login_register', ['login_register' => 'login']);
    }

    //mostrar donaciones
    public function showDonations(){
        return view('index.donations');
    }

    //mostrar actividades
    public function showActivities(){
        return view('index.activities');
    }

    //mostrar dashboard dependiendo del rol
    public function showDashboard(){
        if(auth()->user()->role == 'admin') {
            return view('dashboard.admin.index');
        }elseif(auth()->user()->role == 'beneficiario'){
            return view('dashboard.beneficiario.index');
        } elseif(auth()->user()->role == 'voluntario'){
            return view('dashboard.voluntario.index');
        } elseif(auth()->user()->role == 'coordinador'){
            return view('dashboard.coordinador.index');
        } elseif(auth()->user()->role == 'donador'){
            return view('dashboard.donador.index');
        } else{
            return view('dashboard.user.index');
        }
    }
}
