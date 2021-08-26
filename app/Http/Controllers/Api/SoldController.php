<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailPenjualan;

class SoldController extends Controller
{
    public function index()
    {
        $sold = DetailPenjualan::join('barang','detail_penjualan.id_barang', '=', 'barang.id_barang')->get();
        return response()->json(
            $sold,
            200
        );
    }

}