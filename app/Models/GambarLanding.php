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

}
