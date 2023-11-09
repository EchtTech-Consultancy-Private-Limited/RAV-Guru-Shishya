<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowUpPatient extends Model
{
    use HasFactory;
    protected $fillable = [
        'guru_id',
        'shishya_id',
        'registration_no',
        'patient_id',
        'follow_up_date',
        'report_type',
        'progress',
        'treatment'
    ];

    public function followUpHistory()
    {
        return $this->belongsTo(FollowUpHistoryLog::class, 'id','follow_up_id');
    }
}
