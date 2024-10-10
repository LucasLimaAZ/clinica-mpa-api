<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'patient_id', 'medication', 'how_to_use', 'amount'];

    public function patient()
{
    return $this->belongsTo(Patient::class, 'patient_id');
}
}
