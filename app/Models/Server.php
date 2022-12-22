<?php

namespace App\Models;

use Database\Factories\ServerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    protected $table = 'servers';
    
    protected $fillable = [
        'name',
        'ram',
        'ram_specification',
        'storage',
        'storage_alias',
        'storage_description',
        'disk_type',
        'location',
        'price',
        'currency'
    ];

    /**
     * @return ServerFactory
     */
    protected static function newFactory(): ServerFactory
    {
        return ServerFactory::new();
    }

}