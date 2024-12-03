<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramVolunteer extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'volunteer_id',
        'assigned_at',
    ];

    // Relaciones
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class);
    }
}
