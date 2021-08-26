<?php

namespace App\Models;
use App\Models\DetailBarang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table='barang';

    public function detailBarang(){
        return $this->hasMany(DetailBarang::class, 'id_barang', 'id_barang');
    }
  
}


