<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhrReportSubmitted extends Model
{
    use HasFactory;
    protected $table = 'phr_report_submitted';
     protected $fillable =
        [
            'shishya_id',
            'guru_id',
            'submitted_date',
            'report_details',
            'status'
        ];
    
}
