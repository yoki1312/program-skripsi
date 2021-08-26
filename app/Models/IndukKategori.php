<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndukKategori extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table='induk_kategori';
    protected $primaryKey = 'id_indukKategori';
}
