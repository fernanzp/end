<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['incoming_msg_id', 'outgoing_msg_id', 'msg'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'outgoing_msg_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'incoming_msg_id');
    }

    
}

