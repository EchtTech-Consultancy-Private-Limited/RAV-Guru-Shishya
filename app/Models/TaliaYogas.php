<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaliaYogas extends Model
{
    use HasFactory;
     protected $table = 'taliayogas';
    protected $fillable = 
    [
      'yoga_type',
      'talia_yoga_type_individual',
      'kalka_dravyas_step_first',
      'kalka_dravyas_step_second',
      'taila_dravys_step_first',
      'taila_dravys_step_second',
      'taila_dravys_step_three',
      'kvatha_dravyas_step_first',
      'kvatha_dravyas_step_second',
      'kvatha_dravyas_step_three',
      'kvatha_dravyas_step_murchana',
      'preparation_of_kalka',
      'preparation_of_kavatha_dravyas',
      'order_of_mixing',
      'paka_procedure',
      'packing',
      'storage',
      'method_of_administration',
      'time_of_administration',
      'dose',
      'vehicle',
      'duration_of_therapy',
      'wholesome_diet',
      'wholesome_activities',
      'wholesome_behaviour',
      'indications',
      'contra_indications',
      'quantity_of_raw_material',
      'quantity_of_finished_product',
      'loss',
      'reasons_for_loss',
      'mridu',
      'organoleptic_properties_of_raw_materials',
      'organoleptic_properties_of_finished_product',
      'starting_date',
      'ending_date',
      'shishya_id',
      'date_of_yogas'
    ];
}
