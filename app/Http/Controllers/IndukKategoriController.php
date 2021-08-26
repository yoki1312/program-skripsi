<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndukKategori;

use App\Imports\IndukKategoriImport;
use Illuminate\Support\Facades\DB;
use DataTables; 
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class IndukKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('layouts.admin.IndukKategori.view');
    }
    public function dataIndukKategori(){
        return DataTables::of(IndukKategori::all())
            ->addColumn('action', function($data){
                $button = '<button type="button" name="edit" id="'.$data->id_indukKategori.'" class="edit btn btn-primary btn-sm"> <i class="fa fa-pencil"></i></button>';
                $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="'.$data->id_indukKategori.'" class="deleted btn btn-danger btn-sm"> <i class="fa fa-trash"></i></button>';
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
        $barang = new IndukKategori;
        $barang->nama_indukKategori = $request->nama_indukKategori;
        $barang->save();
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
            $data = IndukKategori::findOrFail($id);
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
        IndukKategori::where('id_indukKategori',$request->id_IndukKategori)->update(array('nama_indukKategori' => $request->nama_IndukKategori));

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
        DB::table('induk_Kategori')->where('id_indukKategori', $id)->delete();
        return response()->json(['success' => 'Data is successfully updated']);
    }


    public function import_excel(Request $request) 
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file'); //GET FILE
            Excel::import(new IndukKategoriImport, $file); //IMPORT FILE 
            return redirect()->back()->with(['success' => 'Upload success']);
        }  
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }
}
