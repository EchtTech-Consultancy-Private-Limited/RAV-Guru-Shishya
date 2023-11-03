<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'guru_id',
        'shishya_id',
        'attendance_date',
        'attendance',
        'attendance_morning_timing',
	    'attendance_evening_timing',
	    'in_time',
	    'out_time',
    ];

    protected $casts = [
        'attendance_morning_timing' => 'array',
        'attendance_evening_timing' => 'array',
    ];
}
