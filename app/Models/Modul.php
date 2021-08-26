<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    // use HasFactory;
    protected $table='modul';
    protected $primaryKey ='id_modul';

    public function subModul()
    {
        return $this->belongsTo('App\Models\SubModul');
    }
}
