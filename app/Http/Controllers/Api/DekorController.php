<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dekor;

class DekorController extends Controller
{
    public function index()
    {
        $dekor = Dekor::all();
        return response()->json(
            $dekor,
            200
        );
    }

}