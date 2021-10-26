<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\PenjualanBarang;
use App\Models\DetailBarang;
use App\Models\Koment;
use Illuminate\Support\Facades\DB;
class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $produk =  DB::table('penjualan')
        ->join('barang','barang.id_barang','=', 'penjualan.id_barang')
        ->select('barang.deskripsi','barang.gambar_sampul','barang.harga','barang.nama_barang','barang.id_barang','penjualan.stock')
        ->get();
        return view('layouts.plantshop.shop.view',compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('barang')->select('barang.*','kategori.nama_kategori','bankdata.kebutuhanAir','bankdata.kebutuhanSinar','bankdata.caraPerawatan')->leftjoin('bankdata','bankdata.id_bankdata','barang.id_bankdata')->join('kategori','kategori.id_kategori','barang.id_kategori')->where('id_barang',$id)->first();
        $detail = DB::table('detail_barang')->where('id_barang',$id)->get();

        $barang = DB::table('barang')
        ->leftjoin('kategori','kategori.id_kategori','=', 'barang.id_kategori')
        ->leftjoin('subKategori','subKategori.id_subKategori','=', 'barang.id_subKategori')
        ->leftjoin('bankdata','bankdata.id_bankdata','=', 'barang.id_bankdata')
        ->select('barang.*','kategori.nama_kategori','subKategori.nama_subKategori','bankdata.*')
        ->where('barang.id_barang',$id)
        ->get();
        // printJSON($barang);
        $barang_detail = DetailBarang::where('id_barang',$id)->get();
        $koment = Koment::where('produk_id',$id)->get();
        return view('layouts.plantshop.shop.detail',compact('barang','barang_detail','koment','data','detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
