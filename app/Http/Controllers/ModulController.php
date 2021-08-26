<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modul;
use App\Models\SubModul;
use Illuminate\Support\Facades\DB;
use DataTables; 
class ModulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->routeArray = app('request')->route()->getAction();
        $this->controllerAction = class_basename($this->routeArray['controller']);
    }
    public function index()
    {
        $menu = Modul::all();
        return view('layouts.admin.modul.view',compact('menu'));
    }
    public function datajson()
	{
	return DataTables::of(DB::table('submodul')
        ->join('modul','modul.id_modul','=', 'submodul.id_Modul')
        ->select('modul.modul','submodul.SubModul','submodul.link','submodul.id_subModul','submodul.id_Modul','modul.no_urut')
        ->orderby('no_urut','asc')
        ->get()) 
        ->addIndexColumn()
        ->addColumn('action', function($row){

               $btn = '';
               $btn = $btn.' <a href="Submodul/edit/'.$row->id_subModul.'"  class="edit btn btn-primary btn-xs"> <i class="fa fa-edit" aria-hidden="true"></i></a>';
               $btn = $btn.' <a href="Submodul/hapus/'.$row->id_subModul.'"  class="edit btn btn-danger btn-xs"> <i class="fa fa-trash" aria-hidden="true"></i></a>';

                return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
	}
    public function modul()
	{
		return DataTables::of(Modul::orderBy('no_urut','asc')->get()) 
        ->addIndexColumn()
        ->addColumn('action', function($row){

               $btn = '';
               $btn = $btn.' <a href="modul/edit/'.$row->id_modul.'"  class="edit btn btn-primary btn-xs"> <i class="fa fa-edit" aria-hidden="true"></i></a>';
               $btn = $btn.' <a href="modul/hapus/'.$row->id_modul.'"  class="edit btn btn-danger btn-xs"> <i class="fa fa-trash" aria-hidden="true"></i></a>';

                return $btn;
        })
        ->addColumn('NoUrut', function($row){

               $btn = '';
               if($row->no_urut !=null || $row->no_urut !=''){
                   $btn = $btn. '<a type="button" name="edit" id="'.$row->id_modul.'" class="editNoUrut">'.$row->no_urut.'</button>';
                }
                else{
                    $btn = $btn. '<a type="button" name="edit" id="'.$row->id_modul.'" class="editNoUrut"> Urut</button>';
                }
                return $btn;
        })
        ->rawColumns(['action','NoUrut'])
        ->make(true);
    }
    public function autocomplete(Request $request)
    {
        $res = SubModul::select("SubModul")
                ->where("SubModul","LIKE","%{$request->term}%")
                ->get();
    
        return response()->json($res);
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
        // untuk validasi form
        if($request->indukModul == "#"){
            $this -> validate($request, [
                'nama_modul' => 'required',
                'link' => 'required',
                'icon' => 'required',
                'indukModul' => 'required',
                ]);
                DB::table('modul') -> insert([
                    'modul' => $request -> nama_modul,
                    'icon' => $request -> icon,
                ]);
        }else{
            DB::table('submodul') -> insert([
                
                'id_modul' => $request -> indukModul,
                'SubModul' => $request -> nama_modul,
                'link' => $request -> link,
                ]);
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
        $modul = Modul::where('id_modul',$id)->get();
        $submodul = SubModul::where('id_modul',$id)->get();
        return view('layouts.admin.modul.edit',compact('modul','submodul'));
    }
    public function urut($id)
    {
        if(request()->ajax())
        {
            $data = Modul::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }
    public function Subedit($id)
    {
        $md = Modul::all();
        $submodul = DB::table('submodul')
        ->join('modul','modul.id_modul','=', 'submodul.id_modul')
        ->select('modul.modul','submodul.SubModul','submodul.link','submodul.id_subModul','modul.id_modul')
        ->where('id_subModul', $id)
        ->get();
        return view('layouts.admin.modul.editsub',compact('submodul','md'));
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
        $id = $request->id_modul;
        $barang = Modul::where('id_modul',$id)->update([
            'modul' => $request->modul,
            'icon' => $request->icon
        ]);
        return redirect('/modul');
    }
    public function urutan(Request $request)
    {
        $id = $request->id_modul;
        $barang = Modul::where('id_modul',$id)->update([
            'modul' => $request->modul,
            'icon' => $request->icon
        ]);
        return redirect('/modul');
    }
    public function Subupdate(Request $request)
    {
        $id = $request->id_submodul;
        $barang = SubModul::where('id_submodul',$id)->update([
            'id_Modul' => $request->modul,
            'SubModul' => $request->nama
        ]);
        return redirect('/modul');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('modul')->where('id_modul', $id)->delete();
        DB::table('submodul')->where('id_modul', $id)->delete();
        return redirect('/modul');
    }
    public function hapussub($id)
    {
        // dd($id);
        DB::table('submodul')->where('id_subModul', $id)->delete();
        return redirect('/modul');
    }
    public function editurut(Request $request)
    {
        Modul::where('id_modul',$request->id_modul)->update(array('no_urut' => $request->no_urut));

        return response()->json(['success' => 'Data is successfully updated']);
    }
}
