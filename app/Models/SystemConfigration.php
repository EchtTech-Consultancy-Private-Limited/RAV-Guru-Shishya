<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemConfigration extends Model
{
    use HasFactory;
    protected $table = 'system_settings';
    protected $fillable = 
    [
      'project_name',
      'short_description',
      'long_description',
      'address',
      'logo',
      'favicon',
      'copyright',
      'user_name',
      'email',
      'contact_no',
      'meta_tag_title',
      'meta_tag_keywords',
      'meta_tag_desc',
      'facebook',
      'instagram',
      'linkedin',
      'twitter',
      
      
    ];
}
