<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhrReportRemarks extends Model
{
    use HasFactory;
    protected $table = 'phr_notifications';
     protected $fillable =
        [
           'sender_id',
            'reciever_id',
            'sender_type',
            'reciever_type',
            'comment_by_guru',
            'comment_by_shishya',
            'shishya_read_status',
            'guru_read_status',
            'date'
        ];
    
}
