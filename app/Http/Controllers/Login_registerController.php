<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\If_;

class Login_registerController extends Controller
{
    public function login_register($login_register){
        return view('login_register', compact('login_register'));
    }
}