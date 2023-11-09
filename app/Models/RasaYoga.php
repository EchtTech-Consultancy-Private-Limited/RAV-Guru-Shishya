<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RasaYoga extends Model
{
    use HasFactory;
    protected $table = 'rasa_yogas';
    protected $fillable = 
    [
      
      'herbal_first',
      'herbal_second',
      'mineral_first',
      'mineral_second',
      'metal_first',
      'metal_second',
      'animal_first',
      'animal_second',
      'bhavana_dravayas_first',
      'bhavana_dravayas_second',
      'changes_seen_during_bhavana_therapy',
      'organoleptic_properties_of_raw_material',
      'organoleptic_properties_of_finished_product',
      'time_taken_for_the_experiment',
      'starting_date_of_experiment',
      'ending_date_of_experiment',
      'yoga_type',
      'rasa_yoga_type_individual',
      'shishya_id',
      'date_of_yogas'
    ];
    public function drugHistory()
    {
        return $this->belongsTo(DrugHistoryLog::class, 'id','rasa_id');
    }
}
