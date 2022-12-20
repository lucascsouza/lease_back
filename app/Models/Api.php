<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Api extends Model
{
    use HasApiTokens;
    
    protected $table = 'api';
    
    protected $fillable = [
        'name'
    ];

}