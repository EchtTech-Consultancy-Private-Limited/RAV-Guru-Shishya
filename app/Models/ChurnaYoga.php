<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChurnaYoga extends Model
{
    use HasFactory;
    protected $table = 'churna_yogas';
    protected $fillable = 
    [
      'step_first',
      'step_second',
      'step_three',
      'step_four',
      'packing',
      'storage',
      'method_of_administration',
      'time_of_administration',
      'dose',
      'vehicle',
      'duration_of_therapy',
      'wholesome_diet',
      'wholesome_activities',
      'wholesome_behavior',
      'indications',
      'contra_indications',
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
      'yoga_type',
      'churna_yoga_type_individual',
      'shishya_id',
      'date_of_yogas'
    ];
}
