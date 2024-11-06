<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donations;

class DonationController extends Controller
{
    public function getTransactions(Request $request)
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
                'user_id' => auth()->id(),
            ]);
    
            return response()->json([
                'message' => 'Transaction created successfully',
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function getTransactionsAnonimo(Request $request)
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
                'message' => 'Transaction created successfully',
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
