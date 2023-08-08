<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPermission extends Model
{
    use HasFactory;
    protected $table = 'model_permissions';
    protected $fillable = [
        'model_id', 'permission_id', 'user_id'
    ];
}
