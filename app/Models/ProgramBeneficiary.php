<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramBeneficiary extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'beneficiary_id',
        'assigned_at',
    ];

    // Relaciones
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }
}
