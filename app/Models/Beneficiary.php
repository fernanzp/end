<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'birthdate', 'gender', 'education_level', 'address', 'phone', 'guardian_email', 'guardian_ine', 'kinship', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}