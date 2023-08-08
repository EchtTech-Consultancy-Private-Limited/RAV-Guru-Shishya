<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugChuranPart extends Model
{
    use HasFactory;
     protected $table = 'drug_churan_parts';
     protected $fillable = 
        [
            'drug_id',
            'name_of_the_ingredients',
            'part_used',
            'quantity'

        ];
}
