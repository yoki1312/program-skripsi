<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubModul extends Model
{
    protected $table='submodul';

    public function modul()
    {
        return $this->hasMany('App\Models\Modul');
    }
}
