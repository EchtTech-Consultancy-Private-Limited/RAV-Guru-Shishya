<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhrNotificationSend extends Model
{
    use HasFactory;
    protected $table = 'phr_notification_sends';
    protected $fillable =
    [
        'shishya_id',
        'status'
    ];
}
