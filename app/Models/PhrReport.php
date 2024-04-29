<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhrReport extends Model
{
    use HasFactory;
    protected $table = 'phr_report';
     protected $fillable =
        [
            'registration_no',
            'date',
            'patient_name',
            'diagnosis',
            'shishya_id',
            'guru_id',
            'status'
        ];
    
}
