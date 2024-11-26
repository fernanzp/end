<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $authUserId = auth()->id();
    
        $users = User::whereHas('messagesSent', function ($query) use ($authUserId) {
            $query->where('incoming_msg_id', $authUserId);
        })
        ->orWhereHas('messagesReceived', function ($query) use ($authUserId) {
            $query->where('outgoing_msg_id', $authUserId);
        })
        ->get();
    
        return view('dashboard.messaging', compact('users'));
    }
    
    
    

    public function search(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $users = User::where('id', '!=', auth()->id())
            ->where(function ($query) use ($searchTerm) {
                $query->where('name', 'LIKE', "%$searchTerm%")
                      ->orWhere('last_name', 'LIKE', "%$searchTerm%")
                        ->orWhere('email', 'LIKE', "%$searchTerm%");
            })
            ->get();
        return response()->json(['users' => $users]);
    }

    public function fetchMessages()
    {
        $authId = auth()->id();
    
        $users = User::where('id', '!=', $authId)
            ->where(function ($query) use ($authId) {
                $query->whereHas('messagesSent', function ($subQuery) use ($authId) {
                    $subQuery->where('incoming_msg_id', $authId);
                })->orWhereHas('messagesReceived', function ($subQuery) use ($authId) {
                    $subQuery->where('outgoing_msg_id', $authId);
                });
            })
            ->with(['messagesSent' => function ($query) use ($authId) {
                $query->where('incoming_msg_id', $authId)
                    ->orderBy('created_at', 'desc')
                    ->limit(1);
            }, 'messagesReceived' => function ($query) use ($authId) {
                $query->where('outgoing_msg_id', $authId)
                    ->orderBy('created_at', 'desc')
                    ->limit(1);
            }])
            ->get();
    
        $usersWithMessages = $users->map(function ($user) use ($authId) {
            $lastSentMessage = $user->messagesSent->first();
            $lastReceivedMessage = $user->messagesReceived->first();
    
            $lastMessage = $lastSentMessage && $lastReceivedMessage
                ? ($lastSentMessage->created_at > $lastReceivedMessage->created_at ? $lastSentMessage : $lastReceivedMessage)
                : ($lastSentMessage ?: $lastReceivedMessage);
    
            return [
                'id' => $user->id,
                'name' => $user->name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'rol' => $user->rol,
                'profile_img' => $user->profile_img,
                'last_message' => $lastMessage ? [
                    'content' => $lastMessage->msg,
                    'isOutgoing' => $lastMessage->outgoing_msg_id == $authId,
                    'created_at' => $lastMessage->created_at,
                ] : null,
            ];
        });
    
        // Ordena los usuarios por la fecha del último mensaje
        $sortedUsers = $usersWithMessages
            ->filter(fn($user) => $user['last_message'])
            ->sortByDesc(fn($user) => $user['last_message']['created_at'])
            ->values();
    
        return response()->json(['users' => $sortedUsers]);
    }
    
    
    
    

    public function showChat(User $user)
    {
        // Asegúrate de que el usuario esté autenticado
        $authUser = Auth::user();
        
        return view('dashboard.chat', compact('user', 'authUser'));
    }

    public function getMessages(Request $request)
    {
        $outgoing_id = Auth::id();
        $incoming_id = $request->incoming_id;
    
        $messages = Message::where(function ($query) use ($outgoing_id, $incoming_id) {
            $query->where('outgoing_msg_id', $outgoing_id)
                  ->where('incoming_msg_id', $incoming_id);
        })
        ->orWhere(function ($query) use ($outgoing_id, $incoming_id) {
            $query->where('outgoing_msg_id', $incoming_id)
                  ->where('incoming_msg_id', $outgoing_id);
        })
        ->orderBy('id')
        ->get();
    
        // Marcar mensajes como leídos
        Message::where('incoming_msg_id', $outgoing_id)
            ->where('outgoing_msg_id', $incoming_id)
            ->where('is_read', false)
            ->update(['is_read' => true]);
    
        return response()->json($messages);
    }
    
    
    

    public function sendMessage(Request $request)
    {
        $message = Message::create([
            'outgoing_msg_id' => Auth::id(),
            'incoming_msg_id' => $request->incoming_id,
            'msg' => $request->message,
        ]);
    
        return response()->json(['status' => 'success', 'message' => $message]);
    }
    
}
