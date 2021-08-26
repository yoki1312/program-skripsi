<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisTanaman;
use Illuminate\Support\Facades\DB;
use DataTables; 

class JenisTanamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('layouts.admin.jenisTanaman.view');
    }
    public function dataJenisTanaman(){
        return DataTables::of(JenisTanaman::all())
            ->addColumn('action', function($data){
                $button = '<button type="button" name="edit" id="'.$data->id_jenisTanaman.'" class="edit btn btn-primary btn-xs"> <i class="fa fa-edit"></i></button>';
                $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id_jenisTanaman.'" class="deleted btn btn-danger btn-xs"> <i class="fa fa-trash"></i></button>';
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
        $barang = new JenisTanaman;
        $barang->nama_JenisTanaman = $request->nama_JenisTanaman;
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
            $data = JenisTanaman::findOrFail($id);
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
        JenisTanaman::where('id_JenisTanaman',$request->id_JenisTanaman)->update(array('nama_JenisTanaman' => $request->nama_JenisTanaman));

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
        DB::table('JenisTanaman')->where('id_JenisTanaman', $id)->delete();
        return response()->json(['success' => 'Data is successfully updated']);
    }
}
