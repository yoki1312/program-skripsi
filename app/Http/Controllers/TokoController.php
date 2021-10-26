<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toko = DB::table('toko')->get();
        return view('layouts.plantshop.shop.about',compact('toko'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $toko = DB::table('toko')->get();
        return view('layouts.admin.toko.add',compact('toko'));
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
    public function update(Request $request)
    {
        $in = $request->all();
        $nama_file = '';
        if(isset($request->gambar)){
            $file = $request->file('gambar');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/upload/about/', $nama_file);           
        }else{
            $nama_file = $request->old_img;
        }
        // printJSON($nama_file);
        DB::table('toko')->where('id_toko', $request->id_toko)->update([
            'judul' => $request->judul,
            'about' => $request->about,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'email' => $request->email,
            'maps' => $request->maps,
            'gambar' => $nama_file
            ]);
        return redirect()->back();
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
