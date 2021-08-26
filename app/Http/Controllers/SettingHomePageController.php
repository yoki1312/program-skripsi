<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SettingHomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('homepage')->where('id_induk',1)->get();
        $kecil = DB::table('homepage')->where('id_induk',2)->get();
        return view('layouts.admin.homepage.view', compact('data', 'kecil'));
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
        
        if($request->file('foto') != null){
            // printJSON('aa');
            foreach($request->file('foto') as $key=>$r){
                if(!isset($request->foto_lama[$key])){
                    $fileName = time()."_".$r->getClientOriginalName();
                    $r->move(public_path().'/upload/homepage', $fileName);
                    DB::table('homepage')->insert([
                        'gambar'=>$fileName,
                        'judul'=>$request->judul[$key],
                        'uraian'=>$request->uraian[$key],
                        'id_induk'=> $request->id_induk[$key],
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d')
                    ]);
                }else{
                    DB::table('homepage')->where('id_homepage', $request->id_homepage[$key])->update(['judul' => $request->judul[$key], 'uraian' => $request->uraian[$key]]);
                }
            }
        }else{
            foreach($request->id_homepage as $key => $value){
                DB::table('homepage')->where('id_homepage', $request->id_homepage[$key])->update(['judul' => $request->judul[$key], 'uraian' => $request->uraian[$key]]);
            }
        }
        return redirect()->back();
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
    public function hapus($id)
    {
        DB::table('homepage')->where('id_homepage',$id)->delete();
    }
}
