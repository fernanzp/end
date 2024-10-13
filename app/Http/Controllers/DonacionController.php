<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donations;

class DonacionController extends Controller
{
    public function guardarTransaccion(Request $request)
    {
    // Validar los datos recibidos
    $validatedData = $request->validate([

        'payer_email' => 'required|string',
        'payer_name' => 'required|string',
        'payer_surname' => 'required|string',
        'status' => 'required|string',
        'payer_id' => 'required|string',
        'create_time' => 'required|string',
        'update_time' => 'required|string',
        'amount' => 'required|numeric',
        'currency' => 'required|string',
        'transaction_id' => 'required|string',


        'transaction_id' => 'required|string',
        'amount' => 'required|numeric',
        'payer_email' => 'required|email',
        'payer_name' => 'required|string',
        
    ]);

    // Guardar los datos en la base de datos (suponiendo que tienes un modelo llamado Transaction)
    try {
        Donations::create([
            'payer_email' => $validatedData['payer_email'],
            'payer_name' => $validatedData['payer_name'],
            'payer_surname' => $validatedData['payer_surname'],
            'status' => $validatedData['status'],
            'payer_id' => $validatedData['payer_id'],
            'create_time' => $validatedData['create_time'],
            'update_time' => $validatedData['update_time'],
            'amount' => $validatedData['amount'],
            'currency' => $validatedData['currency'],
            'transaction_id' => $validatedData['transaction_id'],
        ]);

        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        // Manejar cualquier excepción y devolver un error
        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
    }
}
