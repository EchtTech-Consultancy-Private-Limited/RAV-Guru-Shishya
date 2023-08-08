<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelRoute extends Model
{
    use HasFactory;
    protected $table = 'model_routes';
    protected $fillable = ['model_id','route_id'];
}
