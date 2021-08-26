<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeDekor;
use DataTables; 
class HomeDekorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.admin.homeDekor.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.homeDekor.add');
    }
    public function datadekor()
	{
		return DataTables::of(DB::table('barang')
        ->leftjoin('kategori','kategori.id_kategori','=', 'barang.id_kategori')
        ->select('*')
        ->where('id_induk',1)
        ->whereNull('barang.deleted_at')
        ->whereNull('barang.status')
        ->get())  
        ->addIndexColumn()
        ->addColumn('action', function($row){
               $btn = '';
         
               $btn = $btn.'&nbsp;<button type="button" name="edit" id="'.$row->id_barang.'" class="delete btn btn-danger btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i></button>';

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
        $identitas = HomeDekor::distinct('identitas')->count('identitas')+1;
        foreach($request->file('foto') as $item=>$r){
            $fileName = time()."_".$r->getClientOriginalName();
            $r->move(public_path().'/produk/detailProduk', $fileName);
            $data2=array(
                'identitas' => $identitas,
                'foto'=>$fileName,
                'judul'=>$request->keterangan,
            );
            HomeDekor::insert($data2);
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
