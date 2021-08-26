<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\SubKategori;
use App\Models\DetailBarang;
use App\Models\BankData;
use DataTables; 
use Validator;
use Illuminate\Support\Facades\DB;
class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.admin.barang.view');
    }

    public function jsonProduk(){
        return Datatables::of(Barang::all())->make(true);
    }


    public function detailBarang(Request $request)
    {
        return DataTables::of(DetailBarang::all()->where('id_barang', $request->id_barang))  
        ->addIndexColumn()
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function databarang(Request $request)
	{
        // printJSON($request->status);
		return DataTables::of(DB::table('barang')
        ->leftjoin('kategori','kategori.id_kategori','=', 'barang.id_kategori')
        ->select('*')
        ->where('id_induk',1)
        ->whereNull('barang.deleted_at')
        ->where('barang.status', $request->status)
        ->get())  
        ->addIndexColumn()
        ->addColumn('blank', function($row){
               $blank = '';
                return $blank;
        })
        ->addColumn('action', function($row){
               $btn = '';
               $btn = $btn.' <a href="barang/show/'.$row->id_barang.'" class="edit btn btn-warning btn-sm"> <i style="color:white;" class="fa fa-bars" aria-hidden="true"></i></a>';
               $btn = $btn.' <a href="barang/edit/'.$row->id_barang.'" class="edit btn btn-primary btn-sm"> <i class="fa fa-edit" aria-hidden="true"></i></a>';
               $btn = $btn.'&nbsp;<button type="button" name="edit" id="'.$row->id_barang.'" class="delete btn btn-danger btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i></button>';
            
                return $btn;
        })
        ->rawColumns(['action','status','blank'])
        ->make(true);
    }

    public function databarangAll(Request $request)
	{
        if(isset($request->id_induk)){
            $sql = DB::table('barang')->leftjoin('kategori','kategori.id_kategori','=', 'barang.id_kategori')->select('*')->where('id_induk', $request->id_induk)->whereNull('barang.deleted_at')->whereNull('barang.status')->get();

        }else{
            $sql = DB::table('barang')->leftjoin('kategori','kategori.id_kategori','=', 'barang.id_kategori')->select('*')->whereNull('barang.deleted_at')->whereNull('barang.status')->get();

        }
		return DataTables::of($sql)  
        ->addIndexColumn()
        ->addColumn('blank', function($row){
               $blank = '';
                return $blank;
        })
        ->addColumn('action', function($row){
               $btn = '';
               $btn = $btn.' <a href="barang/show/'.$row->id_barang.'" class="edit btn btn-warning btn-sm"> <i style="color:white;" class="fa fa-bars" aria-hidden="true"></i></a>';
               $btn = $btn.' <a href="barang/edit/'.$row->id_barang.'" class="edit btn btn-primary btn-sm"> <i class="fa fa-edit" aria-hidden="true"></i></a>';
               $btn = $btn.'&nbsp;<button type="button" name="edit" id="'.$row->id_barang.'" class="delete btn btn-danger btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i></button>';
            
                return $btn;
        })
        ->rawColumns(['action','status','blank'])
        ->make(true);
    }

    public function create()
    {

        $kategori = Kategori::all();
        $subkategori = SubKategori::all();
        $bankdata = BankData::all();
        // var_dump($bankdata);
        return view('layouts.admin.barang.add',compact('kategori','subkategori','bankdata'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $validator = [
                'nama' => 'required|string'
            ];
            $validator = Validator::make($request->all(), $validator);
 
            if($validator->fails()){
    
                $notif = 'eror';
                return redirect()->back()->with('status', 'Gagal!');
            }
            $bankdata = BankData::select(strtoupper('nama_tanaman'))->where('nama_tanaman','like','%'.strtoupper(trim($request->nama)).'%')->count();
            if($bankdata == 0){
                // var_dump($bankdata);
                    $bankdatas = new BankData;
                    $bankdatas->nama_tanaman = $request->nama;
                    $bankdatas->nama_latin = $request->nama_latin;
                    $bankdatas->id_kategori = $request->id_kategori;
                    $bankdatas->save();
            }
            $kat = Kategori::select('nama_kategori')->where('id_kategori',$request->id_kategori)->get();
            
            foreach($kat as $r){
                $kat = $r->nama_kategori;
            }
            $countLast = Barang::where('id_kategori',$request->id_kategori)->where('id_induk',1)->count()+1;
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
            $barang->nama_latin = $request->nama_latin;
            $barang->diskon = $request->diskon;
            $barang->hargaAwal = $request->hargaAwal;
            $barang->hargaJual = $request->hargaJual;
            $barang->hargaReseler = $request->hargaReseler;
            $barang->hargaPersonal = $request->hargaPersonal;
            $barang->id_kategori = $request->id_kategori;
            $barang->id_subKategori = $request->id_subKategori;
            $barang->berat = $request->berat;
            $barang->panjang = $request->panjang;
            $barang->tinggi = $request->tinggi;
            $barang->lebar = $request->lebar;
            $barang->id_induk = 1;
            $barang->id_bankdata = $request->id_bankdata;
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
                
            return redirect('/barang')->with('status', 'Sukses');
        }

        /**
         * Display the specified resource.
         *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $subkategori = SubKategori::all();
        $bankdata = BankData::all();
        $kategori = Kategori::all();
        $barang = DB::table('barang')
        ->leftjoin('kategori','kategori.id_kategori','=', 'barang.id_kategori')
        ->leftjoin('subKategori','subKategori.id_subKategori','=', 'barang.id_subKategori')
        ->leftjoin('bankdata','bankdata.id_bankdata','=', 'barang.id_bankdata')
        ->select('barang.*','kategori.nama_kategori','subKategori.nama_subKategori', 'bankdata.*')
        ->where('barang.id_barang',$id)
        ->get();
        $barang_detail = DetailBarang::where('id_barang',$id)->whereNull('deleted_at')->get();
        // echo $barang;
        return view('layouts.admin.barang.detail',compact('barang','barang_detail','kategori','subkategori','bankdata'));
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
        $subkategori = SubKategori::all();
        $bankdata = BankData::all();
        $kategori = Kategori::all();
        $barang = DB::table('barang')
        ->leftjoin('kategori','kategori.id_kategori','=', 'barang.id_kategori')
        ->leftjoin('subKategori','subKategori.id_subKategori','=', 'barang.id_subKategori')
        ->select('barang.*','kategori.nama_kategori','subKategori.nama_subKategori')
        ->where('barang.id_barang',$id)
        ->get();
        $barang_detail = DetailBarang::where('id_barang',$id)->whereNull('deleted_at')->get();
        // echo $barang;
        return view('layouts.admin.barang.edit',compact('barang','barang_detail','kategori','subkategori','bankdata'));
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
            $in = $request->all();
            // printJSON($in);
            $name= '';
            if(isset($request->gambar_sampul)){
                $file = $request->file('gambar_sampul');
                $nama_file = time()."_".$file->getClientOriginalName();
                $file->move(public_path().'/upload/img_barang/', $nama_file);
                $name = $nama_file;              
            }else{
                $name = $request->gambar_old;
            }
            $id = $request->id_barang;
            $barang = Barang::where('id_barang',$id)->update([
                'nama_barang' => $request->nama,
                'hargaAwal' => $request->hargaAwal,
                'hargaJual' => $request->hargaJual,
                'hargaReseler' => $request->hargaReseler,
                'hargaPersonal' => $request->hargaPersonal,
                'id_kategori' => $request->id_kategori,
                'id_subKategori' => $request->id_subKategori,
                'berat' => $request->berat,
                'diskon' => $request->diskon,
                'panjang' => $request->diskon,
                'lebar' => $request->diskon,
                'tinggi' => $request->diskon,
                'deskripsi' => $request->deskripsi,
                'gambar_sampul' => $name
            ]);
            if(!empty($request->filename)){

                foreach($request->file('filename') as $item=>$r){
                    $fileName = time()."_".$r->getClientOriginalName();
                    $r->move(public_path().'/upload/img_detail_barang', $fileName);
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
    public function softDeleteFotoBarang(Request $request)
    {
        // printJSON($request);
        Barang::where('id_barang', $request->id_barang)->update(array('gambar_sampul' => null));
        return json_encode(array('statusCode'=>200));
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

    public function bankData(){
        return DataTables::of(DB::table('bankdata')
        ->leftjoin('kategori','kategori.id_kategori','=', 'bankdata.id_kategori')
        ->leftjoin('jenisTanaman','jenisTanaman.id_jenisTanaman','=','bankdata.id_jenisTanaman')
        ->select('bankdata.*','kategori.nama_kategori','jenisTanaman.nama_jenisTanaman')
        ->get())
        ->make(true);
    }
}
