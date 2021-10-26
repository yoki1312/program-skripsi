<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = Auth::user()->id;
        $dataBeli = DB::select("SELECT
        ta.no_invoice,
        ta.tgl_penjualan,
        ta.id_status_penjualan,
        sum(tc.hargaJual) as total_uang,
        count(ta.id_penjualan) as total_pembelian
    FROM
        penjualan ta
        LEFT JOIN detail_penjualan tb ON ta.id_penjualan = tb.id_penjualan 
        LEFT JOIN barang tc ON tb.id_barang = tc.id_barang
    WHERE ta.id_users = '$id_user'
    GROUP BY
        ta.id_penjualan");
        return view('layouts.plantshop.akun.profile', compact('dataBeli'));
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
        //
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
        $user = Auth::user();
        $foto = '';
        if(isset($request->foto_profile)){
            $file = $request->file('foto_profile');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/upload/foto_profile/', $nama_file);
            $foto = $nama_file;        
        }
        DB::table('users')
                ->where('id', $user->id)
                ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'tanggal_lahir' => date('Y-m-d', strtotime($request->tanggal_lahir)),
                    'no_wa' => $request->no_hp,
                    'alamat' => $request->alamat,
                    'foto_profile' => $foto == '' ? $user->foto_profile : $foto,
                    'password' => $request->pass == null ? $user->password : Hash::make($request->pass),
            ]);
            return redirect('profile')->with(['success' => 'Update data berhasil']);
    }
    public function updatev2(Request $request)
    {
        $user = Auth::user();
        $foto = '';
        if(isset($request->foto_profile)){
            $file = $request->file('foto_profile');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/upload/foto_profile/', $nama_file);
            $foto = $nama_file;        
        }
        DB::table('users')
                ->where('id', $user->id)
                ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'tanggal_lahir' => date('Y-m-d', strtotime($request->tanggal_lahir)),
                    'no_wa' => $request->no_hp,
                    'alamat' => $request->alamat,
                    'foto_profile' => $foto == '' ? $user->foto_profile : $foto,
                    'password' => $request->pass == null ? $user->password : Hash::make($request->pass),
            ]);
            return redirect()->back()->with(['success' => 'Update data berhasil']);
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
