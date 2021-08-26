<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class BankDataFrondController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->nama_tanaman != null){
            $bankdata = DB::table('bankdata')->where('nama_tanaman', 'like', '%'.$request->nama_tanaman.'%')->paginate(10);
        }else{
            $bankdata = DB::table('bankdata')->whereNotNull('foto_sampul')->paginate(10);
        }
        return view('layouts.plantshop.bankdata.view', compact('bankdata'));
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
        $data = DB::table('bankdata')->where('id_bankdata', $id)->first();
        $detail = DB::table('detail_bankdata')->where('id_bankdata', $id)->get();
        $kategori = DB::table('kategori')->where('id_kategori', $data->id_kategori)->first();
        // printJSON($data);
        return view('layouts.plantshop.bankdata.detail', compact('data','detail','kategori'));
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
