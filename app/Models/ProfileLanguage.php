<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileLanguage extends Model
{
    use HasFactory;

    protected $table='profile_languages';
     protected $fillable = ['lang_name', 'reading', 'writing', 'speaking','user_id'];
}
