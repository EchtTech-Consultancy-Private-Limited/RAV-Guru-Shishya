<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
      use HasFactory;
    protected $fillable = [
        'guru_id',
        'date_of_report',
        'patient_name',
        'registration_no',
        'age',
        'registration_date',
        'gender',
        'age_group',
        'occupation',
        'marital_status',
        'aasan_sidhi',
        'season',
        'region_of_patient',
        'address',
        'main_complaintsaid_by_patient',
        'said_by_patient_duration',
        'main_complaint_as_said_by_family',
        'complaint_as_said_by_family_duration',
        'past_illness',
        'family_history',
        'skin',
        'nadi',
        'nadi_place',
        'nails',
        'anguli_sandhi',
        'netra',
        'adhovartma',
        'hastatala',
        'jihwa',
        'aakriti',
        'shabda',
        'koshtha',
        'agni',
        'mala_pravritti',
        'mutra_pravritti',
        'vyavay_pravritti',
        'shukrakshana_pravritti',
        'aartava_pravratti_kala',
        'bhara',
        'raktachapa',
        'hrid_gati',
        'shvasagati',
        'parkriti_parikshana',
        'examination_by_physician',
        'prayogashaliya_parikshana',
        'samprapti_vivarana',
        'vibhedaka_pariksha',
        'roga_vinishchaya_pramukh_nidana',
        'chikitsa_kalpana_anupana_sahita',
        'samshodhana_kriyas',
        'samshamana_kriyas',
        'pathya_apathya',
        'dehoshma',
        'phr_a_status',
        'phr_g_status',
        'phr_s_status',
        'shishya_id',
        'patient_type',
        'read_time',
        'soft_drink', 
        'madhyahan_bhojana', 
        'prataraasha', 
        'pulses', 
        'pulpy_vegetables', 
        'oil_tail', 
        'afternoon_fruit', 
        'evening_meals', 
        'bed_time', 
    ];

    public function patientHistory()
    {
        return $this->belongsTo(PatientHistoryLog::class, 'id','patient_id');
    }

}
