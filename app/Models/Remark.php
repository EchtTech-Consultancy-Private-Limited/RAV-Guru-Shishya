<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    use HasFactory;
     protected $fillable = [
        'guru_id',
        'shishya_id',
        'phr_id',
         'send_to',
         'remarks',
         'followup_id',

     ];
}
