<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePublication extends Model
{
    use HasFactory;
    protected $table='profiles_publications';
     protected $fillable = ['user_id', 'no_of_case_reports', 'research_papers', 'books_published','no_of_seminars'];
}
