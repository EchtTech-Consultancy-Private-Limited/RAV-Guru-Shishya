<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugHistoryLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'data', 'drug_id','rasa_id','vati_id','taila_id','aswa_id','user_id', 'user_type',
    ];
}
