<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        // Si el usuario no tiene un correo registrado
        if (!$user->email) {
            return view('user.add-email', ['user' => $user]);
        }elseif(!$user->last_name) {
            return view('user.add-lastname', ['user' => $user]);
        }

        return view('user.dashboard', ['user' => $user]);
    }

    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);

        $user = Auth::user();
        $user->email = $request->email;
        $user->save();

        return redirect()->route('user.dashboard')->with('success', 'Correo electrónico actualizado.');
    }

    public function updateLastName(Request $request)
    {
        $request->validate([
            'last_name' => 'required',
        ]);

        $user = Auth::user();
        $user->last_name = $request->last_name;
        $user->save();

        return redirect()->route('user.dashboard')->with('success', 'Apellido actualizado.');
    }
}
