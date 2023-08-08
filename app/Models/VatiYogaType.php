<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VatiYogaType extends Model
{
    use HasFactory;
     protected $table = 'vatiyogastype';
     protected $fillable = 
        [
            'drug_vatiyoga_id',
            'name_of_the_ingredients',
            'part_used',
            'quantity'

        ];
}
