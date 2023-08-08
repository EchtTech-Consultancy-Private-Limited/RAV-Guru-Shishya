<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VatiYoga extends Model
{
    use HasFactory;
     protected $table = 'vati_yogas';
     protected $fillable = 
        [
            'yoga_type',
            'vati_yoga_type_individual',
            'step_first',
            'packing',
            'storage',
            'method_of_administration',
            'dose',
            'time_of_administration',
            'duration_of_therapy',
            'vehicle',
            'indicationsduration_of_therapy',
            'contraindicationsduration_of_therapy',
            'wholesome_diet',
            'wholesome_activities',
            'wholesome_behavior',
            'quantity_of_raw_material',
            'quantity_of_finished_product',
            'loss',
            'reasons_for_loss',
            'reasons_for_loss_first',
            'reasons_for_loss_second',
            'organoleptic_properties_of_raw_materials',
            'organoleptic_properties_of_finished_product',
            'starting_date',
            'ending_date',
            'shishya_id',
            'date_of_yogas'

        ];
}
