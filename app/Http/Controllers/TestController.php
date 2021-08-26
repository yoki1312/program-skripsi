<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Modul;
use App\Models\PenjualanBarang;
use App\Models\SubModul;
use App\Models\DetailPenjualan;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {      
        $routeName = \Route::currentRouteName();    
        
    }
    public function index()
    {
        $data = DetailPenjualan
        ::leftjoin('barang as aa','aa.id_barang','=','detail_penjualan.id_barang')
        ->leftjoin('induk_kategori as ik','ik.id_indukKategori','=','aa.id_induk')
        // ->whereNotNull('aa.deleted_at')
        // ->whereNotNull('aa.status')
        ->select(\DB::raw('COUNT(detail_penjualan.id_barang) as total_jual'),'ik.nama_indukKategori as nk')
        ->GroupBy('aa.id_induk')
        ->get();

        $userData = PenjualanBarang::select(\DB::raw("COUNT(*) as count"))
        ->groupBy(\DB::raw("Month(tgl_penjualan)"))
        ->pluck('count');
        // print_r();
        return view('layouts.admin.dashboard.dashboard', compact('userData','data'));

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
}
