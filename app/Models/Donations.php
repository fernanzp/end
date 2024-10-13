<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donations extends Model
{
    use HasFactory;

    protected $fillable = [
        'payer_email',
        'payer_name',
        'payer_surname',
        'status',
        'payer_id',
        'create_time',
        'update_time',
        'amount',
        'currency',
        'transaction_id',
    
    ];


}
