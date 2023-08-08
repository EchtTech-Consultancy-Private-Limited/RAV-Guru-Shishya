<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileSpecificDetails extends Model
{
    use HasFactory;
    protected $table='profiles_other_specific_details';

    protected $fillable=
    ['user_id','honourar_attachment_to_any_colg','any_recognition_award','any_other_speciality','exp_ayurvedic_clinical','any_teaching_exp','area_specialization','teaching_exp_input','honourar_attackment'];
}
