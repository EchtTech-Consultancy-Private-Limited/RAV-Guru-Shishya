<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugRasaPart extends Model
{
    use HasFactory;
    protected $table = 'rasa_yoga_type';
     protected $fillable = 
        [
            'drug_rasayogas_id',
            'name_of_the_ingredients_mineral_metal',
            'rasa_part_used',
            'rasa_quantity',

        ];
}
