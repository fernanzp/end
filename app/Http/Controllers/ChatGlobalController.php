<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GlobalMessage;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class ChatGlobalController extends Controller
{

    public function sendMessage(Request $request)
    {
        $message = GlobalMessage::create([
            'user_id' => Auth::id(),
            'msg' => $request->message,
        ]);
    
        return response()->json(['status' => 'success', 'message' => $message]);
    }
    public function getMessages()
    {
        $messages = GlobalMessage::with('user')->get();
        return response()->json($messages);
    }
    
    

}
