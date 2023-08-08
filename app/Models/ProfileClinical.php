<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileClinical extends Model
{
    use HasFactory;
    protected $table='profiles_clinical';
    protected $fillable = ['user_id', 'name_of_board', 'regis_no', 'year_of_regis','any_done_services','name_of_clinic','working_days','clinic_morning_timing','clinic_evening_timing','weekend_off','address1','address2','country','state','city','pincode','average_no_of_patients_in_opd','weather_maintaining_no_of_beds','average_no_of_occupancy_annually','medicine_manufacturing_section','panchakarma','ksharsutra','any_other','total_area','no_of_rooms','no_of_wards_beds','facilities_available','weather_maintaining'];

     /*public function setworking_daysAttribute($value)
        {
            $this->attributes['working_days'] = json_encode($value);
        }

    public function getworking_daysAttribute($value)
    {
        return $this->attributes['working_days'] = json_decode($value);
    }

     public function setclinic_morning_timingAttribute($value)
        {
            $this->attributes['clinic_morning_timing'] = json_encode($value);
        }

    public function getclinic_morning_timingAttribute($value)
    {
        return $this->attributes['clinic_morning_timing'] = json_decode($value);
    }

     public function setclinic_evening_timingAttribute($value)
        {
            $this->attributes['clinic_evening_timing'] = json_encode($value);
        }

    public function getclinic_evening_timingAttribute($value)
    {
        return $this->attributes['clinic_evening_timing'] = json_decode($value);
    }*/

    protected $casts = [
        'working_days' => 'array',
        'clinic_morning_timing'=>'array',
        'clinic_evening_timing'=>'array',
    ];
}
