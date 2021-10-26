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
        $in = $request;
       return DB::table('komentar_artikel')->insert([
            'id_artikel' => $in->id_artikel,
            'komentar'  => $in->komentar,
            'id_user'    => Auth::user()->id,
            'created_at'    => date('Y-m-d'),
            'updated_at'    => date('Y-m-d')
        ]);
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

    public function daftarArtikel(Request $request){
        // $data = DB::table('artikel')->get();
        $sql = "SELECT
        ta.*,
        tc.nama_kategori,
        count( tb.id_artikel ) AS total_komentar 
    FROM
        tips ta
        LEFT JOIN komentar_artikel tb ON ta.id_tips = tb.id_artikel 
        LEFT JOIN kategori tc ON ta.id_kategori = tc.id_kategori
    WHERE 1=1 ";
        if(isset($request->id_kategori)){
            $sql .= " AND tc.id_kategori = '$request->id_kategori'";
        }
        if(isset($request->srch)){
            $sql .= " AND tc.nama_kategori LIKE '%$request->srch%' OR ta.judul LIKE '%$request->srch%'";
        }

        $sql .= "GROUP BY ta.id_tips ORDER BY ta.created_at DESC";
        $data = DB::table( DB::raw("($sql) AS a"))->paginate(4);
        if($request->ajax())
        {
            return view('v2.list-artikel',compact('data'))->render();
        }
        return view('v2.artikel',compact('data'));
    }

    public function detailArtikel($id)
    {
        $data = DB::table('tips')->select('tips.*','kategori.nama_kategori')->join('kategori','kategori.id_kategori','tips.id_kategori')->where('id_tips', $id)->first();
        // printJSON($artikel);
        $komentar = DB::select("select ta.*, tb.name from komentar_artikel ta LEFT JOIN users tb on ta.id_user = tb.id where ta.id_artikel = '$id'");
        $total_komentar = KomentArtikel::where('id_artikel',$id)->count();
        return view('v2.detail-artikel',compact('data','komentar','total_komentar'));
    }

    public function getKomentar($id){
        $komentar = DB::select("select ta.*, tb.name, tb.foto_profile from komentar_artikel ta LEFT JOIN users tb on ta.id_user = tb.id where ta.id_artikel = '$id'");
        return $komentar;
    }

    public function removeKoment(Request $request){
        return DB::table('komentar_artikel')->where('id_koment',$request->id_komentar)->delete();
    }
}
