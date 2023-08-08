<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArishtaYoga extends Model
{
    use HasFactory;
    protected $table = 'arishtayoga';
     protected $fillable =
        [
            'yoga_type',
            'arishtayoga_type_individual',
            'main_ingredients_step_one',
            'main_ingredients_step_two',
            'stormain_ingredients_step_threeage',
            'prakshepa_dravyas_step_one',
            'prakshepa_dravyas_step_two',
            'prakshepa_dravyas_step_three',
            'method_of_preparation',
            'packing',
            'storage',
            'method_of_administration',
            'time_of_administration',
            'dose',
            'vehicle',
            'indications',
            'contra_indications',
            'duration_of_therapy',
            'wholesome_diet',
            'wholesome_activities',
            'wholesome_behavior',
            'quantity_of_raw_material',
            'loss',
            'reasons_for_loss',
            'time_taken_sandhana',

            'duration_for_entire_experiment',
            'tests_performed_during_experiment',
            'starting_date',
            'ending_date',
            'shishya_id',
           'date_of_yogas'

        ];
}
