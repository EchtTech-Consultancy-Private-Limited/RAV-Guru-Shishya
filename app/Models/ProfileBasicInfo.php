<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileBasicInfo extends Model
{
    use HasFactory;
    protected $table='profiles_basic_info';
     protected $fillable = ['f_name', 'date_of_birth', 'age', 'address1','address2','is_same_permanent_address','per_address1','per_address2','aadhaar_no','pan_no','pincode','per_pincode','per_country','per_state','per_city','user_id'];
}
