<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Server extends Model
{
    use HasApiTokens;
    
    protected $table = 'servers';
    
    protected $fillable = [
        'name',
        'ram',
        'ram_specification',
        'storage',
        'storage_description',
        'disk_type',
        'location',
        'price',
        'currency'
    ];

}