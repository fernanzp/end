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
}
