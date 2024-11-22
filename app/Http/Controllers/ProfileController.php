<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard/profile');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
        ]);

        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');

        if ($user->save()) {
            return redirect()->route('profile.index')->with('success', 'Datos actualizados correctamente');
        } else {
            return redirect()->route('profile.index')->with('error', 'Error al actualizar los datos');
        }
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

        // No retornamos ningún mensaje, simplemente dejamos que el frontend maneje el resultado
        return response()->json();
    }
}