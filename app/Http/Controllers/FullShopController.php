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
    public function indexV2(Request $request)
    {
        $in = $request;
        $sort_filter = '';
        $id_kategori = '';
        $sql = "select ta.*, tb.nama_kategori from barang ta join kategori tb ON ta.id_kategori = tb.id_kategori where ta.status is null and ta.deleted_at is null and ta.diskon = '0'";
        if(!empty($in->id_kategori)){
            $sql .= " AND ta.id_kategori = '$in->id_kategori'";
            $id_kategori = $request->id_kategori;
        }
        if(isset($in->nama_tanaman)){
            $sql .= " AND ta.nama_barang LIKE '%$in->nama_tanaman%' OR tb.nama_kategori LIKE '%$in->nama_tanaman%'";
        }
        $q = $in->filter_sort == 'low' ? 'ASC' : 'DESC';
        $produk = DB::table( DB::raw("($sql) AS a"))->orderby('hargaJual', $q)->paginate(9);
        if($request->ajax())
        {
            return view('v2.list-produk',compact('produk'))->render();
        }
		return view('v2.produk-v2',['produk' => $produk, 'sort_filter' => $sort_filter, 'id_kategori' => $id_kategori]);
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

    public function detailProduk($id){
        $data = DB::table('barang')->select('barang.*','kategori.nama_kategori','bankdata.kebutuhanAir','bankdata.kebutuhanSinar','bankdata.caraPerawatan')->leftjoin('bankdata','bankdata.id_bankdata','barang.id_bankdata')->join('kategori','kategori.id_kategori','barang.id_kategori')->where('id_barang',$id)->first();
        $detail = DB::table('detail_barang')->where('id_barang',$id)->get();

        // printJSON($data);

        return view('v2.detail-produk',compact('data','detail'));
    }
    public function getKomentar($id_barang){
        $komentar = DB::table('koment_produk')->join('users','users.id','koment_produk.user_id')->where('produk_id',$id_barang)->get();
         return $komentar;
    }
}
