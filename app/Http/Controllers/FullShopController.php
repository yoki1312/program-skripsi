<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\PenjualanBarang;
use App\Models\DetailPenjualan;
class FullShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->id_kategori != null){
            $produk = DB::table('barang')->whereNull('deleted_at')->whereNull('status')->where('id_kategori', $request->id_kategori)->where('diskon', '0')->paginate(10);
        }elseif($request->nama_tanaman != null){
            $produk = DB::table('barang')->whereNull('deleted_at')->whereNull('status')->where('nama_barang', 'like','%'.$request->nama_tanaman.'%')->where('diskon', '0')->paginate(10);
        }
        else{
            $produk = DB::table('barang')->whereNull('deleted_at')->whereNull('status')->where('diskon', '0')->paginate(10);
        }
 
		return view('layouts.plantshop.shop.view',['produk' => $produk]);
    }

    public function ProdukTerjual()
    {
        $produk = DB::table('barang')->where('status',1)->paginate(10);
 
		return view('layouts.plantshop.shop.produk_terjual',['produk' => $produk]);
    }

    public function ProdukPromo()
    {
        $produk = DB::table('barang')->where('diskon', '!=', '0')->paginate(10);
 
		return view('layouts.plantshop.shop.promo',['produk' => $produk]);
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
        //
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
    public function batalTransaksi($id)
    {
        PenjualanBarang::where('id_penjualan', $id)->delete();
        DetailPenjualan::where('id_penjualan', $id)->delete();
        return redirect()->back();
    }

    public function hapusPesanan($id){
        DB::table('temporary_order')->where('id_pre_order', $id)->delete();
        return redirect()->back();
    }
}
