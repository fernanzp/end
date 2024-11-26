<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersRequestController extends Controller
{
    public function index()
    {
        $requests = DB::table('users')
            ->join('volunteers', 'users.id', '=', 'volunteers.user_id')
            ->where('volunteers.status', 2)
            ->select(
                'users.id as user_id',
                'users.email',
                DB::raw('"Voluntario" as rol'),
                'volunteers.birthdate',
                'volunteers.address',
                'volunteers.phone',
                'volunteers.education as education_level',
                'volunteers.ine_document as guardian_ine',
                'volunteers.created_at'
            )
            ->union(
                DB::table('users')
                    ->join('beneficiaries', 'users.id', '=', 'beneficiaries.user_id')
                    ->where('beneficiaries.status', 2)
                    ->select(
                        'users.id as user_id',
                        'users.email',
                        DB::raw('"Beneficiario" as rol'),
                        'beneficiaries.birthdate',
                        'beneficiaries.address',
                        'beneficiaries.phone',
                        'beneficiaries.education_level',
                        'beneficiaries.guardian_ine',
                        'beneficiaries.created_at'
                    )
            )
            ->orderBy('created_at', 'desc')
            ->get();
    
        return view('dashboard.user_requests', compact('requests'));
    }

    public function aprobarSolicitud(Request $request)
    {
        $userId = $request->input('user_id');
        $rol = $request->input('rol'); // Obtiene el rol que se está solicitando (beneficiario o voluntario)

        // Actualiza el campo status en la tabla correspondiente
        if ($rol == 'beneficiario') {
            DB::table('beneficiaries')
                ->where('user_id', $userId)
                ->update(['status' => 1]);
        } elseif ($rol == 'voluntario') {
            DB::table('volunteers')
                ->where('user_id', $userId)
                ->update(['status' => 1]);
        }

        // Actualiza el campo rol en la tabla users
        DB::table('users')
            ->where('id', $userId)
            ->update(['rol' => $rol]);

        return redirect()->back()->with('success', 'Solicitud aceptada y rol actualizado correctamente.');
    }

    public function rechazarSolicitud(Request $request)
    {
        $userId = $request->input('user_id');
        $rol = $request->input('rol'); // Obtiene el rol que se está solicitando (beneficiario o voluntario)

        // Actualiza el campo status en la tabla correspondiente
        if ($rol == 'beneficiario') {
            DB::table('beneficiaries')
                ->where('user_id', $userId)
                ->update(['status' => 0]);
        } elseif ($rol == 'voluntario') {
            DB::table('volunteers')
                ->where('user_id', $userId)
                ->update(['status' => 0]);
        }

        return redirect()->back()->with('success', 'Solicitud rechazada correctamente.');
    }
}