<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RavUser extends Model
{
    use HasFactory;
     protected $table = 'ravusers';
     protected $fillable = [
        'title',
        'firstname',
        'middlename',
        'lastname',
        'email',
        'password',
        'mobile_no',
        'user_type',
        'password',
        'e_sign',
        'user_image',


    ];
}
