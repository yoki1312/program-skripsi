<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceMidtransModel extends Model
{
    use HasFactory;

    public const EXPIRY_DURATION = 7;
    public const EXPIRY_UNIT = 'days';

}
