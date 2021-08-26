<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables; 
use Session;
use DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.admin.user.index');
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

    public function data(){
        $sql = "select ta.*, COUNT(tb.id_users) as total_pembelian from users ta left JOIN penjualan tb ON ta.id = tb.id_users and tb.id_status_penjualan != '0' GROUP BY ta.id ORDER BY ta.level DESC";
        return DataTables::of(DB::select($sql))
            ->addColumn('action', function($data){
                if($data->level != '1'){
                $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-xs"> <i class="fa fa-edit"></i></button>';
                $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="deleted btn btn-danger btn-xs"> <i class="fa fa-trash"></i></button>';
                }else{
                    $button = '';
                }
                return $button;
                })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function riwayatBeli(Request $request)
    {
        $sql ="SELECT
        ta.no_invoice,
        ta.tgl_penjualan,
        tc.nama_barang
    FROM
        penjualan ta
        LEFT JOIN detail_penjualan tb ON ta.id_penjualan = tb.id_penjualan
        LEFT JOIN barang tc ON tb.id_barang = tc.id_barang
        WHERE ta.id_users = '$request->id_user'";
        return DataTables::of(DB::select($sql)) ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checkEmail = DB::table('users')->where('email', $request->email)->count();
        if($checkEmail >= 1){
            return response()->json('gagal');
        }else{
            DB::table('users')->insert([
                'email' => $request->email,
                'name' => $request->name,
                'level' => $request->level,
                'password' => Hash::make($request->password)
            ]);
            return response()->json(['success' => 'Data is successfully created']);
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
    public function update(Request $request)
    {
        $data = DB::table('users')->where('id', $request->id)->first(); 
        $checkEmail = DB::table('users')->where('email', $request->email)->where('id', '!=', $request->id)->count();
        if($checkEmail >= 1){
            return response()->json('gagal');
        }else{
        DB::table('users')->where('id', $request->id)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
            'password' => ($request->password == null ? $data->password : Hash::make($request->password))
            ]);
            return response()->json(['success' => 'Data is successfully updated']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DB::table('users')->where('id',$id)->delete();
        return redirect('users')->with('status', 'hapus');
    }
}
