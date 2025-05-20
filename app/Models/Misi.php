<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Misi extends Model
{
    
    public $table = 'misi';
    public $primaryKey = 'id_misi';

    protected $fillable = [
        'misi',
        'order',
    ];


    protected static function booted()
    {
        static::addGlobalScope('order', function ($query) {
            $query->orderBy('order');
        });
    }

}
