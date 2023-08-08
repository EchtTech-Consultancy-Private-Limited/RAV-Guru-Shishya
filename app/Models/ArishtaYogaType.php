<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArishtaYogaType extends Model
{
    use HasFactory;
    protected $table = 'arishtayogatype';
    protected $fillable =
       [
           'drug_arishtayogas_id',
           'name_of_the_ingredients',
           'part_used',
           'quantity'

       ];
}
