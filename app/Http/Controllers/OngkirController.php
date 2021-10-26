<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class OngkirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProvinsi(Request $request){
        $daftarProvinsi = '';
        if ($request->has('q')) {
            $cari = $request->q;
            $daftarProvinsi = RajaOngkir::provinsi()->search($cari)->get();
        }else{
            $daftarProvinsi = RajaOngkir::provinsi()->all();
        }
        return response()->json($daftarProvinsi);
    }
    
    public function getKota(Request $request){
        $id_provinsi = $request->id_provinsi;
        $daftarKota = '';
        if (isset($request->term)) {
            $cari = $request->term;
            $daftarKota = RajaOngkir::kota()->dariProvinsi($id_provinsi)->search($cari)->get();
        }else{
            $daftarKota = RajaOngkir::kota()->dariProvinsi($id_provinsi)->get();
        }
        return response()->json($daftarKota);
    }
     
    public function getOngkir(Request $request)
    {
        // printJSON( $this->replace($request->city_destination));
        $kurir = $request->courier;
        // printJSON($kurir);
        $cost = RajaOngkir::ongkosKirim([
            'origin'        => $this->replace($request->origin), // ID kota/kabupaten asal
            'destination'   => $this->replace($request->city_destination), // ID kota/kabupaten tujuan
            'weight'        => $this->replace($request->weight), // berat barang dalam gram
            'courier'       => $this->replace($kurir) // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();


        return response()->json($cost);
    }

    function replace($text){
        return str_replace('"','',$text);
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
