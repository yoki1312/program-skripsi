<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\IndukKategori;
use App\Models\SubKategori;
use App\Models\DetailBarang;
use App\Models\BankData;
use DataTables; 
use Illuminate\Support\Facades\DB;
class NonTanamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.admin.nonTanaman.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datanontanaman()
	{
		return DataTables::of(DB::table('barang')
        ->leftjoin('kategori','kategori.id_kategori','=', 'barang.id_kategori')
        ->select('*')
        ->where('id_induk','!=',1)
        ->whereNull('barang.deleted_at')
        ->whereNull('barang.status')
        ->get())  
        ->addIndexColumn()
        ->addColumn('blank', function($row){
               $blank = '';
                return $blank;
        })
        ->addColumn('action', function($row){
               $btn = '';
               $btn = $btn.' <a href="barang/nonTanaman/show/'.$row->id_barang.'" class="edit btn btn-warning btn-sm"> <i style="color:white;" class="fa fa-bars" aria-hidden="true"></i></a>';
               $btn = $btn.' <a href="barang/nonTanaman/edit/'.$row->id_barang.'" class="edit btn btn-primary btn-sm"> <i class="fa fa-edit" aria-hidden="true"></i></a>';
               $btn = $btn.'&nbsp;<button type="button" name="edit" id="'.$row->id_barang.'" class="delete btn btn-danger btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i></button>';
            
                return $btn;
        })
        ->rawColumns(['action','status','blank'])
        ->make(true);
    }

    public function create()
    {

        $kategori = IndukKategori::where('id_indukKategori','>',1)->get();
        $subkategori = SubKategori::all();
        $bankdata = BankData::all();
        // var_dump($bankdata);
        return view('layouts.admin.nonTanaman.add',compact('kategori','subkategori','bankdata'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            if($request->hargaAwal > $request->hargaJual ){
                return redirect()->back()->with(['error' => 'Harga jual harus Lebih dari harga beli']);
            }
            $kat = IndukKategori::select('nama_indukKategori')->where('id_indukKategori',$request->id_indukKategori)->get();
            foreach($kat as $r){
                $kat = $r->nama_indukKategori;
            }
            $countLast = Barang::where('id_induk',$request->id_indukKategori)->count()+1;
            $kode = substr($kat,0,1);
            $kode .= $countLast;
            
            $barang = new Barang;
            if($request->sampul != null ){
                $file = $request->file('sampul');
                $nama_file = time()."_".$file->getClientOriginalName();
                $file->move(public_path().'/upload/img_barang/', $nama_file);
                $barang->gambar_sampul = $nama_file;              
            }
            $barang->nama_barang = $request->nama;
            $barang->diskon = $request->diskon;
            $barang->hargaAwal = $request->hargaAwal;
            $barang->hargaJual = $request->hargaJual;
            $barang->id_kategori = $request->id_kategori;
            $barang->id_subKategori = $request->id_subKategori;
            $barang->berat = $request->berat;
            $barang->panjang = $request->panjang;
            $barang->tinggi = $request->tinggi;
            $barang->lebar = $request->lebar;
            $barang->id_induk = $request->id_indukKategori;;
            $barang->kode = $kode;
            $barang->deskripsi = $request->deskripsi;
            $barang->save();
            $id_barang = $barang->id;
            if($request->filename != null){

                foreach($request->file('filename') as $item=>$r){
                    $fileName = time()."_".$r->getClientOriginalName();
                    $r->move(public_path().'/upload/img_detail_barang', $fileName);
                    $data2=array(
                        'id_barang'=>$id_barang,
                        'foto'=>$fileName,
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d')
                    );
                    DetailBarang::insert($data2);
                }
            }
                
            return redirect('/nonTanaman')->with(['success' => 'Data Berhasil Disimpan dan Stock Bertambah']);
        }

        /**
         * Display the specified resource.
         *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $barang = Barang::where('id_barang',$id)->get();
        $barang_detail = DetailBarang::where('id_barang',$id)->get();
        $one = DetailBarang::where('id_barang',$id)->limit('1')->get();
        return view('layouts.admin.nonTanaman.detail',compact('barang','barang_detail','one'));
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
        $kategori = IndukKategori::where('id_indukKategori','>',1)->get();
        $subkategori = SubKategori::all();
        $res = DB::table('barang')
        ->leftjoin('induk_kategori','induk_kategori.id_indukKategori','=', 'barang.id_kategori')
        ->leftjoin('subKategori','subKategori.id_subKategori','=', 'barang.id_subKategori')
        ->select('*')
        ->where('id_barang',$id)
        ->first();
        // printJSON($res);
        $barang_detail = DetailBarang::where('id_barang',$id)->whereNull('deleted_at')->get();
        return view('layouts.admin.nonTanaman.edit',compact('res','barang_detail','kategori','subkategori'));
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
            $id = $request->id_barang;
            $barang = Barang::where('id_barang',$id)->update([
                'nama_barang' => $request->nama,
                'harga' => $request->harga,
                'kategori' => $request->kategori,
                'berat' => $request->berat,
                'kode'=> $data->kode,
                'deskripsi' => $request->deskripsi,
            ]);
            if(!empty($request->filename)){

                foreach($request->file('filename') as $item=>$r){
                    $fileName = time()."_".$r->getClientOriginalName();
                    $r->move(public_path().'/produk/detailProduk/', $fileName);
                    $data2=array(
                        'id_barang'=>$id,
                        'foto'=>$fileName,
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d')
                    );
                    DetailBarang::insert($data2);
                }
            }
            
                
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Barang::where('id_barang',$id)->update(array('deleted_at' => date('Y-m-d')));
    }
    public function softDeleteFile($id)
    {
        DetailBarang::where('id', $id)->update(array('deleted_at' => date('Y-m-d')));
        return redirect()->back();
    }
    public function posting($id)
    {
        Barang::where('id_barang', $id)->update(array('status' => 'on'));
        return redirect()->back();
    }
    public function unposting($id)
    {
        Barang::where('id_barang', $id)->update(array('status' => '0'));
        return redirect()->back();
    }

    public function loadKategori(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data = Kategori::all();
            return response()->json($data);
        }
    }
    public function dataAjax(Request $request)
    {
    	$data = [];
        $search = $request->q;
        if(isset($search)){
            if($request->has('q')){
                $data =Kategori::select("id_kategori","nama_kategori")
                ->where('nama_kategori','LIKE',"%$search%")
                ->get();
            }
        }else{
            $data = Kategori::all();
        }
        return response()->json($data);
    }
    public function selectBarang(Request $request)
    {
    	$data = [];
        $search = $request->q;
        if(isset($search)){
            if($request->has('q')){
                $data =Barang::select("*")
                ->where('nama_barang','LIKE',"%$search%")
                ->get();
            }
        }else{
            $data = Barang::all();
        }
        return response()->json($data);
    }
}
