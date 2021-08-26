<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\DetailBarang;

class BarangController extends Controller
{
    public function index()
    {

        $products = Barang::all();

        return response()->json(
            $products,
            200
        );
    }
    public function tanaman()
    {

        $products = Barang::where('id_induk', '1')->get();

        return response()->json(
            $products,
            200
        );
    }
    public function nontanaman()
    {

        $products = Barang::where('id_induk', '2')->get();

        return response()->json(
            $products,
            200
        );
    }
    public function pot()
    {

        $products = Barang::where('id_kategori', '1')->get();

        return response()->json(
            $products,
            200
        );
    }
    public function dekorasi()
    {

        $products = Barang::where('id_kategori', '2')->get();

        return response()->json(
            $products,
            200
        );
    }
    public function pupuk()
    {

        $products = Barang::where('id_kategori', '3')->get();

        return response()->json(
            $products,
            200
        );
    }
    public function rak()
    {

        $products = Barang::where('id_kategori', '4')->get();

        return response()->json(
            $products,
            200
        );
    }
    public function titip()
    {

        $products = Barang::where('id_kategori', '5')->get();

        return response()->json(
            $products,
            200
        );
    }
    public function baru()
    {
        $products = Barang::orderBy('id_barang', 'desc')->get()->take(4);
        return response()->json(
            $products,
            200
        );
    }
    public function details($id)
    {
        $products = DetailBarang::where('id_barang', $id)->get();
        return response()->json(
            $products,
            200
        );
    }
}