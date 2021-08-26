<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBankData extends Model
{
    use HasFactory;
    protected $table = 'detail_bankdata';
    protected $primaryKey = 'id_detailtanaman';
    protected $fillable = ['id_bankdata','foto'];
}
