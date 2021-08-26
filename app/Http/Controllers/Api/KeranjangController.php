<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\Barang;
use Validator;

class KeranjangController extends Controller
{
    public function index()
    {
        $products = Keranjang::join('barang', 'keranjang.id_barang', '=', 'barang.id_barang')->where('id_users', '3')->get();
        return response()->json(
            $products,
            200
        );
    }
    public function jumlah(){
        $hitung = Keranjang::where('id_users','3')->count();
        return response()->json(
            [['jumlah' =>$hitung]],
            200
        );
    }
    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'id_users' => 'required',
            'id_barang' => 'required|unique:keranjang'
        ]);
        
        if($validator->fails()){
            return response()->json(["message"=>"produk Sudah di Keranjang "],400);       
        }else{
            $product = Keranjang::create($input);

            return response()->json(
            ['products'=> $product,
            "message"=> "berhasil menambahkan ke Keranjang",],
                200
            );
        }
    }
    public function delete($id) {
        $product = Keranjang::where('id_keranjang', $id)->delete();
        // $product->delete();
        return response()->json(['message'=>"produk berhasil dihapus"],200);
    } 
    public function total() {
        $products = Keranjang::join('barang', 'keranjang.id_barang', '=', 'barang.id_barang')->where('id_users', '3')->sum('hargaJual');
        // $product->delete();
        return response()->json([['total'=>$products]], 200);
    } 

}