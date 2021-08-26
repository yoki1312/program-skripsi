<?php 
use App\Models\Produk;
use App\Models\TemporaryOrder;
use App\Models\Kategori;

function AllProdukOne(){
    $Produk = Produk::skip(0)->take(4)->whereNull('deleted_at')->whereNull('status')->get();
    // printJSON($Produk);
    return $Produk;
}
function AllProdukTwo(){
    $Produk = Produk::skip(4)->take(8)->whereNull('deleted_at')->whereNull('status')->get();
    return $Produk;
}
function AllProduk(){
    $Produk = Produk::all();
    return $Produk;
}
function newsProduk(){
    $Produk = Produk::orderByDesc('created_at')->whereNull('deleted_at')->whereNull('status')->get();
    return $Produk;
}
function Kategori(){
    $Kategori = Kategori::all();
    return $Kategori;
}
function pesananku(){
    $user = Auth::user()->id;
    $pes = DB::select("SELECT ta.*, tb.hargaPenjualan, tc.gambar_sampul, tc.nama_barang,tc.hargaJual, tc.diskon FROM penjualan ta LEFT JOIN detail_penjualan tb ON ta.id_penjualan = tb.id_penjualan LEFT JOIN barang tc ON tb.id_barang = tc.id_barang where ta.id_users = '$user' ");
    return $pes;
}

function mycheckout(){
  $aa =  DB::table('temporary_order')
        ->leftjoin('barang','temporary_order.id_barang','=','barang.id_barang')
        ->select('*')
        ->where('id_user', Auth::user()->id)
        ->get();
    return $aa;
}
function Checkout(){
    if(!empty(Auth::user()->id)){
    $sql= DB::table('temporary_order')
        ->leftjoin('barang','temporary_order.id_barang','=','barang.id_barang')
        ->select('*')
        ->where('id_user', Auth::user()->id)
        ->take(3)
        ->get();
    return $sql;
    }
}
function AllCheckout(){
    if(!empty(Auth::user()->id)){

        $getCountCheckout= TemporaryOrder::where('id_user', Auth::user()->id)->count();
        // dd($getCountCheckout);
        return $getCountCheckout;
    }
}
function printJSON($v){
    header('Access-Control-Allow-Origin: *');
    header("Content-type: application/json");
    echo json_encode($v, JSON_PRETTY_PRINT);
    exit;
}

 function slide_bar(){
     $sql = DB::table('homepage')->get();
     return $sql;
 }

 function cek_url(){
    return $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://';
 }

 function get_last_buy(){
     $sql = "select ta.no_invoice, tc.name, count(tb.id_penjualan) as pembelian from penjualan ta LEFT JOIN detail_penjualan tb ON ta.id_penjualan = tb.id_penjualan INNER JOIN users tc ON ta.id_users = tc.id group by ta.id_penjualan LIMIT 5 ";
     return DB::select($sql);
 }

?>