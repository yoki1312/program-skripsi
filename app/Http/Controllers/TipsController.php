<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tips;
use App\Models\Kategori;
use Carbon\Carbon;
use DataTables; 
use Illuminate\Support\Facades\DB;
class TipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('layouts.admin.tips.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataTips()
    {
        return DataTables::of(DB::table('tips')->leftjoin('kategori','kategori.id_kategori','=','tips.id_kategori')->orderBy('tips.created_at', 'DESC')->get())
        ->addIndexColumn()
        ->addColumn('action', function($row){
               $btn = '';
               $btn .= ' <a href="tipss/show/'.$row->id_tips.'" class="edit btn btn-warning btn-sm"> <i style="color:white;" class="fa fa-bars" aria-hidden="true"></i></a>';
            //    $btn = $btn.' <a href="tipss/edit/'.$row->id_tips.'" class="edit btn btn-primary btn-xs"> <i class="fa fa-edit" aria-hidden="true"></i></a>';
               $btn .= '&nbsp;<a href="hapus/artikel/'.$row->id_tips.'" type="button" name="edit" id="'.$row->id_tips.'" class="delete btn btn-danger btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i></a>';

                return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function create()
    {
        $kategori = Kategori::all();
        return view('layouts.admin.tips.add',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->isi == null || $request->isi == ''){
            return redirect()->back()->with(['error' => 'Form tidak boleh ada yang kosong']);
        }
        $tips = new Tips;
        $file = $request->file('foto_tips');
        if(isset($file)){
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/upload/artikel/', $nama_file);      
        }
        $tips->judul = $request->judul;
        $tips->id_kategori = $request->id_kategori;
        $tips->hastag = $request->hastag;
        $tips->isi = $request->isi;
        if(isset($nama_file)){
            $tips->foto_tips = $nama_file;
        }
        $tips->save();
        return redirect('/tipss')->with(['success' => 'Data berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('tips')
        ->leftjoin('kategori','kategori.id_kategori','=','tips.id_kategori')
        ->where('id_tips',$id)
        ->orderBy('tips.created_at', 'DESC')->get();
        return view('layouts.admin.tips.detail',compact('data'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::all();
        $data = DB::table('tips')
        ->leftjoin('kategori','kategori.id_kategori','=','tips.id_kategori')
        ->where('id_tips',$id)
        ->get();
        return view('layouts.admin.tips.edit',compact('data','kategori'));
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
        $file = $request->file('foto_tips');
        if(isset($file)){
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/upload/artikel/', $nama_file);      
        }
        if(isset($nama_file)){
            Tips::where('id_tips',$request->id_tips)->update([
                'judul' => $request->judul,
                'id_kategori' => $request->id_kategori,
                'hastag' => $request->hastag,
                'isi' => $request->isi,
                'foto_tips' => $nama_file,
            ]);
        }else{
            Tips::where('id_tips',$request->id_tips)->update([
                'judul' => $request->judul,
                'id_kategori' => $request->id_kategori,
                'hastag' => $request->hastag,
                'isi' => $request->isi,
            ]);
        }
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
    public function hapusGambar($id)
    {
        Tips::where('id_tips', $id)->update(array('foto_tips' => null));
        return response()->json(['success' => 'Data Added successfully.']);
    }
    public function deleted_artikel($id)
    {
        Tips::where('id_tips', $id)->delete();
        return redirect()->back()->with(['hapus' => 'Data berhasil disimpan']);
    }
}
