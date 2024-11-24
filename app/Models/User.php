<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'profile_img',
        'email',
        'password',
        'rol',
        'status',
        'id_google',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function messages()
    {
        return Message::where(function ($query) {
            $query->where('incoming_msg_id', $this->id)
                  ->orWhere('outgoing_msg_id', $this->id);
        });
    }
    
    public function messagesSent()
    {
        return $this->hasMany(Message::class, 'outgoing_msg_id');
    }

    public function messagesReceived()
    {
        return $this->hasMany(Message::class, 'incoming_msg_id');
    }
    
    // En el modelo User (app/Models/User.php)
    public function volunteers()
    {
        return $this->hasMany(Volunteer::class);
    }

}
