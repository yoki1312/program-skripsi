<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GreenDekor;
use DataTables; 
use DB;
class GreenDekorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.admin.greenDekor.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.greenDekor.add');
    }
    public function datadekor()
	{
        $sql = "select * from dekor";
        $sqlmain = DB::select($sql);
		return DataTables::of($sqlmain)  
        ->addIndexColumn()
        ->addColumn('action', function($row){
               $btn = '';
         
               $btn = $btn.'&nbsp;<button type="button" name="edit" id="'.$row->id_dekor.'" class="delete btn btn-danger btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i></button>';

                return $btn;
        })
        ->rawColumns(['action','status'])
        ->make(true);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $identitas = DB::table('dekor')->distinct('identitas')->count('identitas')+1;
        foreach($request->file('foto') as $item=>$r){
            $fileName = time()."_".$r->getClientOriginalName();
            $r->move(public_path().'/upload/dekorasi', $fileName);
            $data2=array(
                'identitas' => $identitas,
                'id_jenisDekor' => $request->id_jenisDekor,
                'foto'=>$fileName,
                'judul'=>$request->keterangan,
            );
            DB::table('dekor')->insert($data2);
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
}
