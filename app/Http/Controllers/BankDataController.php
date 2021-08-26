<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\JenisTanaman;
use App\Models\BankData;
use App\Models\DetailBankData;
use App\Models\MediaTanam;
use DataTables; 
use Illuminate\Support\Facades\DB;

class BankDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.admin.bankdata.view');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mediaTanam = MediaTanam::all();
        $kategori = Kategori::all();
        $jenistanaman = JenisTanaman::all();
        return view('layouts.admin.bankdata.add',compact('kategori','jenistanaman','mediaTanam'));
        //
    }
    public function bankData(){
        return DataTables::of(DB::table('bankdata')
        ->leftjoin('kategori','kategori.id_kategori','=', 'bankdata.id_kategori')
        ->leftjoin('jenisTanaman','jenisTanaman.id_jenisTanaman','=','bankdata.id_jenisTanaman')
        ->select('bankdata.*','kategori.nama_kategori','jenisTanaman.nama_jenisTanaman')
        ->get())
            ->addColumn('action', function($data){
                $button = '<a href="bankddata/edit/'.$data->id_bankdata.'" type="button" name="edit" id="'.$data->id_bankdata.'" class="edit btn btn-primary btn-sm"> <i class="fa fa-bars"></i></a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a href="hapus/bankdata/'.$data->id_bankdata.'" type="button" onclick="return confirm("Anda yakin ingin menghapus data?");" id="'.$data->id_bankdata.'" class="deleted btn btn-danger btn-sm"> <i class="fa fa-trash"></i></a>';
                return $button;
                })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function bankDatas(){
        return DataTables::of(DB::table('bankdata')
        ->leftjoin('kategori','kategori.id_kategori','=', 'bankdata.id_bankdata')
        ->leftjoin('jenisTanaman','jenisTanaman.id_jenisTanaman','=','bankdata.id_jenisTanaman')
        ->select('bankdata.*','kategori.nama_kategori','jenisTanaman.nama_jenisTanaman')
        ->get())
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

        if($request->hargaMin > $request->hargaMax){
            return redirect()->back()->with(['error' => 'Harga Maximal harus lebih tinggi dari harga Minimal']);
        }
        // printJSON($request->all());
        $bankData = new BankData;
        if($request->foto_sampul != null && $request->foto_sampul != '' ){
            $file = $request->file('foto_sampul');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/upload/bank_data/', $nama_file);
            $bankData->foto_sampul = $nama_file;

        }
        $bankData->nama_latin = $request->nama_latin;
        $bankData->nama_tanaman = $request->nama_tanaman;
        $bankData->id_kategori = $request->id_kategori;
        $bankData->hargaMin = $request->hargaMin;
        $bankData->hastag = $request->hastag;
        $bankData->idMediaTanam = $request->idMediaTanam;
        $bankData->hargaMax = $request->hargaMax;
        $bankData->id_jenisTanaman = $request->id_jenisTanaman;
        $bankData->spesifikasi = $request->spesifikasi;
        $bankData->caraPerawatan = $request->caraPerawatan;
        $bankData->kebutuhanSinar = $request->kebutuhanSinar;
        $bankData->kebutuhanAir = $request->kebutuhanAir;
        $bankData->save();
        $id_bankdata = $bankData->id;
        if($request->foto != null && $request->foto != '' ){
            foreach($request->file('foto') as $item=>$r){
                $fileName = time()."_".$r->getClientOriginalName();
                $r->move(public_path().'/upload/detail_bank_data', $fileName);
                $data2=array(
                    'id_bankdata'=>$bankData->id,
                    'foto'=>$fileName,
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                );
                DetailBankData::insert($data2);
            }
        }
            
        return redirect('/bankddata')->with(['success' => 'Data Berhasil Disimpan']);
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
        
        $kategori = Kategori::all();
        $jenistanaman = JenisTanaman::all();
        $mediaTanam = MediaTanam::all();
        $bankdata = DB::table('bankdata')
        ->leftjoin('kategori','kategori.id_kategori','=', 'bankdata.id_kategori')
        ->leftjoin('jenisTanaman','jenisTanaman.id_jenisTanaman','=','bankdata.id_jenisTanaman')
        ->leftjoin('mediatanam','mediatanam.id_mediaTanam','=','bankdata.idMediaTanam')
        ->select('bankdata.*','kategori.nama_kategori','jenisTanaman.nama_jenisTanaman','mediatanam.nama_mediaTanam')
        ->where('id_bankdata', $id)
        ->first();
        $detail = DetailBankData::where('id_bankdata', $id)->get();
        $toloop = DetailBankData::where('id_bankdata', $id)->count();
        // printJSON($bankdata);
        return view('layouts.admin.bankdata.edit',compact('kategori','jenistanaman','bankdata','detail','mediaTanam', 'toloop'));
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
        $in = $request;
        $titles = DB::table('bankdata')->where('id_bankdata',$in->id_bankdata)->pluck('foto_sampul')->first();
        if(isset($in->foto_sampul)){
            $file = $request->file('foto_sampul');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/produk/sampul/', $nama_file);
        }
        // printJSON($in->all());
        DB::table('bankdata')->where('id_bankdata', $in->id_bankdata)->update([
            'nama_latin' => $in->nama_latin,
            'nama_tanaman' => $in->nama_tanaman,
            'id_kategori' => $in->id_kategori,
            'id_jenisTanaman' => $in->id_jenisTanaman,
            'spesifikasi' => $in->spesifikasi,
            'hargaMin' => $in->hargaMin,
            'hargaMax' => $in->hargaMax,
            'caraPerawatan' => $in->caraPerawatan,
            'kebutuhanSinar' => $in->kebutuhanSinar,
            'kebutuhanAir' => $in->kebutuhanAir,
            'idMediaTanam' => $in->idMediaTanam,
            'hastag' => $in->hastag,
            'foto_sampul' => (isset($nama_file) ? $nama_file : $titles)
        ]); 
        if(isset($in->foto)){
            foreach($in->foto as $key=>$value){
                $fileName = time()."_".$value->getClientOriginalName();
                $value->move(public_path().'/produk/detailProduk', $fileName);
                DB::table('detail_bankdata')->where('id_detail', $in->id_detail[$key])->update([
                    'foto' => $fileName
                ]); 
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
        // printJSON($id);
        $hapus = DB::table('bankdata')->where('id_bankData', $id)->delete();
        $hapus_detail = DB::table('detail_bankdata')->where('id_bankData', $id)->delete();

        return redirect('bankddata')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
