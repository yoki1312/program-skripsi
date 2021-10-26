<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\TemporaryOrder;
use DataTables; 
use DB;
class Temporary_orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function datapreorder()
	{
        $sql= DB::table('temporary_order')
        ->leftjoin('barang','temporary_order.id_barang','=','barang.id_barang')
        ->select('*')
        ->where('id_user', Auth::user()->id)
        ->get();
		return DataTables::of($sql)  
        ->addIndexColumn()
        ->addColumn('action', function($row){
               $btn = '';
         
               $btn = $btn.'&nbsp;<button type="button" name="edit" id="'.$row->id_pre_order.'" class="delete remove-order btn btn-danger btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i></button>';

                return $btn;
        })
        ->rawColumns(['action'])
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
        $check_data = DB::table('temporary_order')->where('id_barang', $request->produk_id)->where('id_user',Auth::user()->id)->count();
        if($check_data == '0'){
            $preOrder = new TemporaryOrder;
            $preOrder->qty = $request->koment;
            $preOrder->id_barang = $request->produk_id;
            $preOrder->id_user = Auth::user()->id;
            $preOrder->save();
            return response()->json([
                'status' => 200,
                'message' => 'Barang Ditambahkan',
                'total_item'   => $check_data
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Exist Item',
                'total_item'   => $check_data
            ]);
        }
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
    public function deleted($id)
    {
        DB::table('temporary_order')->where('id_pre_order', $id)->delete();
    }
}
