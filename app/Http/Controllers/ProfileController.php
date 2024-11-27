<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Beneficiary;
use App\Models\Volunteer;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Verificar si el usuario es un beneficiario o voluntario
        $beneficiary = Beneficiary::where('user_id', $user->id)->first();
        $volunteer = Volunteer::where('user_id', $user->id)->first();

        return view('dashboard.profile', compact('user', 'beneficiary', 'volunteer'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
    
        // Validación para nombre, apellido, teléfono y dirección
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);
    
        // Actualiza los campos del usuario (nombre y apellido)
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
    
            // Si el usuario es admin, permite actualizar el correo
    if ($user->rol === 'admin' && $request->has('email')) {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id, // Validación de email único
        ]);
        $user->email = $request->input('email');
    }
    
        // Guardar los cambios del usuario
        $user->save();
    
        // Actualizar los datos del beneficiario o voluntario si existen
        $beneficiary = Beneficiary::where('user_id', $user->id)->first();
        $volunteer = Volunteer::where('user_id', $user->id)->first();
    
        if ($beneficiary) {
            if ($request->has('phone')) {
                $beneficiary->phone = $request->input('phone');
            }
            if ($request->has('address')) {
                $beneficiary->address = $request->input('address');
            }
            $beneficiary->save();
        }
    
        if ($volunteer) {
            if ($request->has('phone')) {
                $volunteer->phone = $request->input('phone');
            }
            if ($request->has('address')) {
                $volunteer->address = $request->input('address');
            }
            $volunteer->save();
        }
    
        return redirect()->route('profile.index')->with('success', 'Datos actualizados correctamente');
    }
    


    public function updateImage(Request $request)
    {
        $request->validate([
            'profile_img' => 'nullable|image|mimes:jpg,jpeg,png|max:8192',
        ]);

        $user = Auth::user();

        if ($request->hasFile('profile_img')) {
            $file = $request->file('profile_img');
            $filename = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('img/profile_images'), $filename);

            // Eliminar la imagen anterior si no es la predeterminada
            if ($user->profile_img && $user->profile_img != 'img/profile_images/default.jpg') {
                unlink(public_path($user->profile_img));
            }

            $user->profile_img = 'img/profile_images/' . $filename;
            $user->save();
        }

        return response()->json();
    }
}
