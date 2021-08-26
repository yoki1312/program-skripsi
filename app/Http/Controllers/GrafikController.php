<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class GrafikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function grafik(){
        $index_on_data = DB::table('barang')->whereNull('status')->count();
        $index_off_data = DB::table('barang')->where('status','1')->count();
        $array[] = ['Laporan', 'Laporan'];
        $array[] = ['Stok Tersedia', $index_on_data];
        $array[] = ['Stok Terjual', $index_off_data];
        return json_encode($array);
    }
    public function penjualan_perjenis(){
        $tanaman = DB::table('barang')->where('status','1')->where('id_induk', '1')->count();
        $non_tanaman = DB::table('barang')->where('id_induk','!=','1')->where('status','1')->count();
        $array[] = ['Laporan', 'Laporan'];
        $array[] = ['Tanaman', $tanaman];
        $array[] = ['Non Tanaman', $non_tanaman];
        return json_encode($array);
    }
    public function penjualan_perbualan(){
        $data = DB::select("select DATE_FORMAT(tgl_penjualan,'%Y-%m') as tgl , count(*) as total from penjualan GROUP BY DATE_FORMAT(tgl_penjualan,'%Y-%m') ");
        $array[] = ['Bulan','Jumlah Penjualan'];
        foreach($data as $key => $value){
            $array[] = [ date('F Y', strtotime($value->tgl)), (int)$value->total];
        }
        return json_encode($array);
        
    }
    
    public function penjualan_kategori(){
        $data = DB::select('SELECT tb.nama_kategori, COUNT(ta.id_kategori) as total_laku FROM barang ta  LEFT JOIN kategori tb ON ta.id_kategori = tb.id_kategori WHERE ta.status = "1" GROUP BY ta.id_kategori');
        $array[] = ['Laporan', 'Laporan'];
        foreach($data as $d){
            $array[] = [$d->nama_kategori, (int)$d->total_laku];
        }
        return json_encode($array);
    }
}
