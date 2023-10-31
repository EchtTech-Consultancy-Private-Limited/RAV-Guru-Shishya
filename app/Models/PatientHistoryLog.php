<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientHistoryLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'data', 'patient_id', 'user_id', 'user_type',
    ];
}
