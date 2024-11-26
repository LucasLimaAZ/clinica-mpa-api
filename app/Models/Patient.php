<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_number',
        'full_name',
        'responsible',
        'referral',
        'genre',
        'phone',
        'mobile_phone',
        'business_phone',
        'address',
        'cep',
        'city',
        'uf',
        'neighborhood',
        'observations',
        'file_location'
    ];
}
