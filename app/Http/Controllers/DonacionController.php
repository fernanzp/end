<?php

namespace App\Http\Controllers;

use App\Models\Donations;
use Illuminate\Http\Request;

class DonacionController extends Controller
{
    public function guardarTransaccion(Request $request)
    {
        $validatedData = $request->validate([
            'status' => 'required|string',
            'amount' => 'required|numeric',
            'currency' => 'required|string',
            'transaction_id' => 'required|string',
        ]);

        try{
            Donations::create([
                'status' => $validatedData['status'],
                'amount' => $validatedData['amount'],
                'currency' => $validatedData['currency'],
                'transaction_id' => $validatedData['transaction_id'],                
            ]);

            return response()->json([
                'message' => 'Transacción guardada correctamente'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
