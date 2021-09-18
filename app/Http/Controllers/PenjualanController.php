<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\SubModul;
use App\Models\PenjualanBarang;
use App\Models\DetailPenjualan;
use App\Models\BankData;
use Illuminate\Support\Facades\DB;
use DataTables; 
use Alert;
use PDF;
use Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use SimpleSoftwareIO\QrCode\Generator;
use Redirect;

class PenjualanController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.admin.penjualan.view');
    }
    public function viewpenjualan()
    {

        $barang = Barang::all()
        ->whereNull('barang.deleted_at')
        ->whereNull('barang.status');
        return view('layouts.admin.penjualan.viewpenjualan',compact('barang'));
    }
    public function databarang()
	{
		return DataTables::of(Barang::orderBy('id_barang','ASC')->get())  
        ->addIndexColumn()
        ->addColumn('action', function($data){
            $status = PenjualanBarang::where('id_barang', $data->id_barang)->count();
            $button = '';
            if($status != 0 ){
                $button = '<span class="badge badge-pill badge-success">Sudah Diposting</span>';
            }else{
                $button = '<button type="button" name="edit" id="'.$data->id_barang.'" class="post btn btn-warning btn-xs"> <i class="fa fa-shopping-cart" aria-hidden="true"></button>';
            }
            return $button;
        })
        ->addColumn('totalStock', function($data){
            $buttons = '';
            $buttons = '<a type="button" name="edit" id="'.$data->id_barang.'" class="totalStock">'.$data->stock.'</a>';
            return $buttons;
        })
        ->addColumn('stockDijual', function($data){
            $stock = PenjualanBarang::where('id_barang', $data->id_barang)->get();
            $stockDijual = '';
            $stockDijual = '<a type="button" name="edit" id="'.$data->id_barang.'" class="totalStock">'.$data->stock.'</a>';
            return $stockDijual;
        })
        ->rawColumns(['action','totalStock'])
        ->make(true);
    }

    public function datap()
	{
        return DataTables::of(PenjualanBarang::leftjoin('status_penjualan','status_penjualan.id_status','=','penjualan.id_status_penjualan')->leftjoin('users','penjualan.id_users','=','users.id')->get())  
        ->addIndexColumn()
        ->addColumn('action', function($data){
            $button = '';
            $button = '<a href="penjualan/detail/'.$data->id_penjualan.'"  type="button" class="btn btn-warning btn-sm"><i class="fa fa-bars" aria-hidden="true"></i></a>';
            $button .=  ' <a href="penjualan/hapus/'.$data->id_penjualan.'"  type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>';
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function laporanpenjualan()
	{
        return view('layouts.admin.penjualan.laporanPenjualan');
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
        $sum = PenjualanBarang::count()+1;
        $kode = "PL".$sum;
        $name = $kode.'.svg';
        // \QrCode::size(500)->generate($kode, public_path('upload\img_qr_code_penjualan/'.$name));
        // QrCode::generate($kode, 'E:\smart\plantshop.id\public\upload\img_qr_code_penjualan/'.$name);
        $penjualan = new PenjualanBarang;
        $penjualan->nama_users = $request->nama_customer;
        $penjualan->qr = $name;
        $penjualan->alamat_users = $request->alamat_customer;
        $penjualan->tgl_penjualan = date('Y-m-d',strtotime($request->tanggal_penjualan));
        $penjualan->total = $request->total;
        $penjualan->catatan = $request->catatan;
        $penjualan->no_invoice = $kode;
        $penjualan->id_status_penjualan = 1;
        $penjualan->jenis_customer = $request->jenis_customer;
        $penjualan->save();
        $id_penjualan = $penjualan->id;
        $data = array();
     
            foreach ($request->id_barang as $key => $value) {
                $data = array(
                    'id_penjualan' => $id_penjualan,
                    'id_barang' =>  $value,
                    'created_at' =>  date('Y-m-d H:i:s'),
                    'updated_at' =>  date('Y-m-d H:i:s'),
                    'admin_id' =>  Auth::user()->id_user,
                    'hargaPenjualan' => $request->harga[$key],
                    'diskonPenjualan' => ((isset($request->diskonRupiah[$key])) ? $request->diskonRupiah[$key] : $request->diskonPersen[$key]),
                    'deskripsiDiskon' => (($request->bedStatus == "2" ? "Rupiah" : "Persent")),
                );
                Barang::where('id_barang', $value)->update(array('status' => '1'));
                DetailPenjualan::insert($data);
            }
            return redirect()->action(
                [PenjualanController::class, 'show'], ['id' => $id_penjualan]
            );

    }
    public function storeShop(Request $request)
    {

        $sum = PenjualanBarang::count()+1;
        $rand = rand(0, 50);
        $kode = "PL".$sum.$rand.date('Y/m/d');
        $penjualan = new PenjualanBarang;
        $penjualan->nama_users = Auth::user()->name;
        $penjualan->id_users = Auth::user()->id;
        $penjualan->tgl_penjualan = date('Y-m-d');
        $penjualan->no_invoice = $kode;
        $penjualan->id_status_penjualan = 0;
        $penjualan->save();
        $id_penjualan = $penjualan->id;
        $data = array();
        foreach ($request->id_barang as $key) {
            foreach($key as $value){
            // printJSON($value);
                $dataBarang = Barang::where('id_barang',$value)->first();
                $total = $dataBarang->hargaJual - $dataBarang->diskon;
                $data = array(
                    'id_penjualan' => $id_penjualan,
                    'id_barang' =>  $value,
                    'created_at' =>  date('Y-m-d H:i:s'),
                    'updated_at' =>  date('Y-m-d H:i:s'),
                    'hargaPenjualan' => $total,
                );
                // printJSON($data);
                $user = Auth::user()->id;
                // $sql = "DELETE FROM temporary_order WHERE id_barang = '$value' and id_user = '$user' ";
                // DB::select($sql);
                // Barang::where('id_barang', $value)->update(array('status' => '1'));
                DetailPenjualan::insert($data);
            }
            }
            $data = PenjualanBarang::where('id_penjualan',$id_penjualan)->first(); 
            $pes = DB::select("SELECT ta.*, tb.hargaPenjualan, tc.gambar_sampul, tc.nama_barang,tc.hargaJual, tc.diskon FROM penjualan ta LEFT JOIN detail_penjualan tb ON ta.id_penjualan = tb.id_penjualan LEFT JOIN barang tc ON tb.id_barang = tc.id_barang where ta.id_penjualan = '$id_penjualan' ");
        
            
            return $id_penjualan;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailPenjualan = DB::table('detail_penjualan')
        ->leftjoin('barang','barang.id_barang','=','detail_penjualan.id_barang')->where('detail_penjualan.id_penjualan',$id)->get();
        $penjualan = PenjualanBarang::where('id_penjualan', $id)->get();
        return view('layouts.admin.penjualan.detailpenjualan',compact('penjualan','detailPenjualan'));
        // return redirect('/penjualan');
    }

    public function cetak($id)
    {
        $detailPenjualan = DB::table('detail_penjualan')
        ->leftjoin('barang','barang.id_barang','=','detail_penjualan.id_barang')->where('detail_penjualan.id_penjualan',$id)->get();
        $penjualan = PenjualanBarang::where('id_penjualan', $id)->get();

        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('layouts.admin.penjualan.cetak',compact('penjualan','detailPenjualan'))->stream();
        // $pdf = PDF::loadview('layouts.admin.penjualan.cetak',compact('penjualan','detailPenjualan'));
    
    	// return $pdf->stream();// return $pdf->download('laporan-penjualan-pdf');
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
        $data = DB::table('penjualan')->where('id_penjualan',$id)->delete();
        return redirect('laporanpenjualan')->with('status', 'hapus');
    }
    public function salle()
    {
        $penjualan = new Penjualan;
        $penjualan->id_barang = $request->id_barang;
        $penjualan->stock = $request->stock;
        $penjualan->save();
        return response()->json(['success' => 'Data Added successfully.']);
    }

    public function notif()
    {
        $penjualan = Penjualan::count('id_penjualan')->where('status_baca','=', null)->get();
        echo json_encode(array('jumlah' =>$pe));
    }
    public function unsalle($id)
    {
        Barang::where('id_barang', $id)->update(array('status' => '0'));
    }
    public function generate(){
        QrCode::format('png')->merge('/public/produk/logo.jpg')->generate('public/produk/test.png');
    }
    public function chartJual()
    {
        $userData = Penjualan::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');
          
        return view('', compact('userData'));
    }

    public function dataAjax(Request $request)
    {
    	$data = [];
        $search = $request->q;
        if(isset($search)){
            if($request->has('q')){
                $data =DB::table('status_penjualan')->select("id_status","keterangan")
                ->where('keterangan','LIKE',"%$search%")
                ->get();
            }
        }else{
            $data = DB::table('status_penjualan')->get();
        }
        return response()->json($data);
    }

    public function statusBayar(Request $request)
    {
        PenjualanBarang::where('id_penjualan', $request->id_penjualan)->update(array('id_status_penjualan' => $request->status));
        $dd = DetailPenjualan::where('id_penjualan', $request->id_penjualan)->get();
        foreach($dd as $t){
            $user = Auth::user()->id;
            $sql = "DELETE FROM temporary_order WHERE id_barang = '$t->id_barang' and id_user = '$user' ";
            DB::select($sql);
            Barang::where('id_barang', $t->id_barang)->update(array('status' => '1'));
        }
        return response()->json(['success' => 'Data Added successfully.']);
    }
}
