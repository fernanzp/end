<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_description',
        'description',
        'start_date',
        'end_date',
        'latitude',
        'longitude',
        'place',
        'modality',
        'days_of_the_week',
        'schedule',
        'age',
        'beneficiary_capacity',
        'volunteer_capacity',
        'objetive',
        'contents',
        'financing',
        'img'
    ];
}