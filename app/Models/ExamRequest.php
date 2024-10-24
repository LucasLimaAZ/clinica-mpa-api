<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamRequest extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'exams', 'patient_id'];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
