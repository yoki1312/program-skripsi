<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\KomentArtikel;
class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = DB::table('tips')->paginate(5);
        return view('layouts.plantshop.artikel.artikel',compact('artikel'));
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
        $artikel = DB::table('tips')->where('id_tips', $id)->get();
        $komentar = DB::select("select ta.*, tb.name from komentar_artikel ta LEFT JOIN users tb on ta.id_user = tb.id where ta.id_artikel = '$id'");
        $total_komentar = KomentArtikel::where('id_artikel',$id)->count();
        return view('layouts.plantshop.artikel.detailArtikel',compact('artikel','komentar','total_komentar'));
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
    public function komentar(Request $request)
    {
        $in = $request->all();
        $komentar = New KomentArtikel;
        $komentar->id_user = Auth::user()->id;
        $komentar->id_artikel = $request->id_tips;
        $komentar->komentar = $request->komentar;
        $komentar->created_at = date('Y-m-d');
        $komentar->deleted_at = date('Y-m-d');
        $komentar->updated_at = date('Y-m-d');
        $komentar->save();

        return redirect()->back();
    }
}
