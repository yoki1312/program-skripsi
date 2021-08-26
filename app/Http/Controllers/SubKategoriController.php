<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubKategori;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\Imports\SubKategoriImport;
use Maatwebsite\Excel\Facades\Excel; 

class SubKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('layouts.admin.subKategori.view');
    }
    public function dataKategori(){
        return DataTables::of(SubKategori::all())
            ->addColumn('action', function($data){
                $button = '<button type="button" name="edit" id="'.$data->id_subKategori.'" class="edit btn btn-primary btn-sm"> <i class="fa fa-edit"></i></button>';
                $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="'.$data->id_subKategori.'" class="deleted btn btn-danger btn-sm"> <i class="fa fa-trash"></i></button>';
                return $button;
                })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $subKategori = new SubKategori;
        $subKategori->nama_subKategori = $request->nama_subKategori;
        $subKategori->save();
        return response()->json(['success' => 'Data is successfully updated']);
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
        if(request()->ajax())
        {
            $data = SubKategori::findOrFail($id);
            return response()->json(['result' => $data]);
        }
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
        SubKategori::where('id_subKategori',$request->id_subKategori)->update(array('nama_subKategori' => $request->nama_subKategori));

        return response()->json(['success' => 'Data is successfully updated']);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('subKategori')->where('id_subKategori', $id)->delete();
        return response()->json(['success' => 'Data is successfully updated']);
    }
    public function import_excel(Request $request) 
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file'); //GET FILE
            Excel::import(new SubKategoriImport, $file); //IMPORT FILE 
            return redirect()->back()->with(['success' => 'Upload success']);
        }  
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }
}
