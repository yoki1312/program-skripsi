<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MediaTanam;
use Illuminate\Support\Facades\DB;
use DataTables; 

class MediaTanamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('layouts.admin.mediaTanam.view');
    }
    public function dataMediaTanam(){
        return DataTables::of(MediaTanam::all())
            ->addColumn('action', function($data){
                $button = '<button type="button" name="edit" id="'.$data->id_mediaTanam.'" class="edit btn btn-primary btn-sm"> <i class="fa fa-pencil"></i></button>';
                $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="'.$data->id_mediaTanam.'" class="deleted btn btn-danger btn-sm"> <i class="fa fa-trash"></i></button>';
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
        $MediaTanam = new MediaTanam;
        $MediaTanam->nama_mediaTanam = $request->nama_mediaTanam;
        $MediaTanam->save();
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
            $data = MediaTanam::findOrFail($id);
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
        MediaTanam::where('id_mediaTanam',$request->id_mediaTanam)->update(array('nama_mediaTanam' => $request->nama_mediaTanam));

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
        DB::table('mediaTanam')->where('id_mediaTanam', $id)->delete();
        return response()->json(['success' => 'Data is successfully updated']);
    }
}
