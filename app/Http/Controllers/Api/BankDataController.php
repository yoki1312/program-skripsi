<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BankData;
use App\Models\DetailBankData;

class BankDataController extends Controller
{
    public function index()
    {

        $tanaman = BankData::join('kategori', 'bankdata.id_kategori' , '=',  'kategori.id_kategori')
        ->join('jenisTanaman', 'bankdata.id_jenisTanaman' , '=',  'jenisTanaman.id_jenisTanaman')
        ->join('mediaTanam', 'bankdata.idMediaTanam' , '=',  'mediaTanam.id_mediaTanam')->get();

        return response()->json(
            $tanaman,
            200
        );
    }

    public function details($id)
    {
        $tanaman = DetailBankData::where('id_bankdata', $id)->get();
        return response()->json(
            $tanaman,
            200
        );
    }
}