<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tips;

class TipsController extends Controller
{
    public function index()
    {
        $tips = Tips::all();
        return response()->json(
            $tips,
            200
        );
    }

    public function details($id)
    {
        $tips = Tips::where('id_tips', $id)->get();
        return response()->json(
            $tips,
            200
        );
    }
}