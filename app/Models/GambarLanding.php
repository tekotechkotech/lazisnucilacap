<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GambarLanding extends Model
{
    
    public $table = 'gambar_landing';
    public $primaryKey = 'id_gambar';

    protected $fillable = [
        'gambar',
        'link',
        'position',
    ];

    
    protected static function booted()
    {
        static::addGlobalScope('position', function ($query) {
            $query->orderBy('position');
        });
    }

}
