<?php 
use App\Models\Produk;
use App\Models\TemporaryOrder;
use App\Models\Kategori;
use App\Services\Midtrans\CreateSnapTokenService;

function AllProdukOne(){
    $Produk = Produk::join('kategori','kategori.id_kategori','barang.id_kategori')->skip(0)->take(6)->whereNull('deleted_at')->whereNull('status')->get();
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
    $Kategori = DB::select('select tb.*, COUNT(ta.id_barang) as jumlah_barang from barang ta INNER JOIN kategori tb ON ta.id_kategori = tb.id_kategori WHERE ta.`status` is null GROUP BY ta.id_kategori ORDER BY COUNT( ta.id_barang ) desc');
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

function snapToken(){
    $snapToken = 'asdasd';
    if (empty($snapToken)) {
        // Jika snap token masih NULL, buat token snap dan simpan ke database

        $midtrans = new CreateSnapTokenService($order);
        $snapToken = $midtrans->getSnapToken();

        $order->snap_token = $snapToken;
        $order->save();
    }
}

function getTotalBarang(){
    $data = Produk::join('kategori','kategori.id_kategori','barang.id_kategori')->whereNull('deleted_at')->whereNull('status')->count();
    return $data;
}

function toko(){
    return DB::table('toko')->first();
}

?>