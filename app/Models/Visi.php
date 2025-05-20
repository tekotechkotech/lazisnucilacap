<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visi extends Model
{
    public $table = 'visi';
    public $primaryKey = 'id_visi';

    protected $fillable = [
        'visi',
    ];
}
