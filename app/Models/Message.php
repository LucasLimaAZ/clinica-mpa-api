<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'message', 'date'];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
