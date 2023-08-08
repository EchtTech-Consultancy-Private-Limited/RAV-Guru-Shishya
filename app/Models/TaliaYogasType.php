<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaliaYogasType extends Model
{
    use HasFactory;
    protected $table = 'taliayogastype';
     protected $fillable = 
        [
            'drug_taliayogas_id',
            'name_of_the_ingredients',
            'part_used',
            'quantity'

        ];
}
