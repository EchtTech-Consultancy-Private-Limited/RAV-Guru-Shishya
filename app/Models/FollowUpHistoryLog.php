<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowUpHistoryLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'data', 'follow_up_id', 'user_id', 'user_type',
    ];
}
