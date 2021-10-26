<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', 'App\Http\Controllers\LoginAdminController@showFormLogin')->name('login');
// Route::post('login/user', 'App\Http\Controllers\LoginUserController@login');


Route::get('loginAdmin', 'App\Http\Controllers\LoginAdminController@showFormLogin')->name('loginAdmin');
Route::post('loginAdminPlant', 'App\Http\Controllers\LoginAdminController@login')->name('loginAdminPlant');
Route::get('register', 'App\Http\Controllers\LoginAdminController@showFormRegister')->name('register');
Route::post('register', 'App\Http\Controllers\LoginAdminController@register');

Route::post('loginUser', 'App\Http\Controllers\LoginUserController@login')->name('loginUser');

Route::resource('testt', 'App\Http\Controllers\HomeJualController');
Route::get('/detail/produk/{id}', 'App\Http\Controllers\ShopController@show');
Route::post('/post-coment','App\Http\Controllers\KomentController@store');
Route::post('/add-to-cart','App\Http\Controllers\Temporary_orderController@store');
Route::post('/deleted-to-cart/{id}','App\Http\Controllers\Temporary_orderController@deleted');
Route::get('datapreorder', 'App\Http\Controllers\Temporary_orderController@datapreorder');
Route::group(['middleware' => 'admin'], function () {

    Route::resource('test', 'App\Http\Controllers\TestController');
    
    Route::get('bnkdata', 'App\Http\Controllers\BankDataController@bankDatas');
    Route::resource('/bankddata', 'App\Http\Controllers\BankDataController');
    Route::post('bankddata/store', 'App\Http\Controllers\BankDataController@store');
    Route::get('bdata', 'App\Http\Controllers\BankDataController@bankData');
    Route::get('/bankddata/edit/{id}','App\Http\Controllers\BankDataController@edit');
    Route::get('hapus/bankdata/{id}','App\Http\Controllers\BankDataController@destroy');
    Route::post('/bankddata/update','App\Http\Controllers\BankDataController@update');
    
    Route::get('/referensi/bankdata', 'App\Http\Controllers\BarangController@bankData');
    Route::resource('shop', 'App\Http\Controllers\ShopController');

    Route::resource('greendekor', 'App\Http\Controllers\GreenDekorController');
    Route::post('/greendekor/store','App\Http\Controllers\GreenDekorController@store');
    Route::get('datadekor', 'App\Http\Controllers\GreenDekorController@datadekor');

    Route::resource('homedekor', 'App\Http\Controllers\HomeDekorController');
    Route::post('/homedekor/store','App\Http\Controllers\HomeDekorController@store');
    Route::get('datahomedekor', 'App\Http\Controllers\HomeDekorController@datadekor');
    
    Route::resource('tipss', 'App\Http\Controllers\TipsController');
    Route::post('/tips/store','App\Http\Controllers\TipsController@store');
    Route::get('/dataTips', 'App\Http\Controllers\TipsController@dataTips');
    Route::get('/tipss/edit/{id}','App\Http\Controllers\TipsController@edit');
    Route::get('/tipss/show/{id}','App\Http\Controllers\TipsController@show');
    Route::post('/tipss/hapusGambar/{id}', 'App\Http\Controllers\TipsController@hapusGambar');
    Route::post('/tipss/update','App\Http\Controllers\TipsController@update');
    Route::get('/hapus/artikel/{id}','App\Http\Controllers\TipsController@deleted_artikel');

    Route::resource('modul', 'App\Http\Controllers\ModulController');
    Route::post('/update/no_urut/modul','App\Http\Controllers\ModulController@editurut');
    Route::get('/modul/editUrutan/{id}', 'App\Http\Controllers\ModulController@urut');

    Route::resource('penjualan', 'App\Http\Controllers\PenjualanController');
    Route::post('penjualan/store', 'App\Http\Controllers\PenjualanController@store');
    Route::get('viewpenjualan', 'App\Http\Controllers\PenjualanController@viewpenjualan');
    Route::get('laporanpenjualan', 'App\Http\Controllers\PenjualanController@laporanpenjualan');
    Route::get('datap', 'App\Http\Controllers\PenjualanController@datap');
    Route::get('/penjualan/detail/{id}', 'App\Http\Controllers\PenjualanController@show');
    Route::get('/penjualan/cetak/{id}', 'App\Http\Controllers\PenjualanController@cetak');
    Route::get('/penjualan/hapus/{id}', 'App\Http\Controllers\PenjualanController@destroy');
    Route::get('/cok', 'App\Http\Controllers\PenjualanController@generate');
    
    Route::get('/chartJual', 'App\Http\Controllers\PenjualanController@chartJual');
    

    Route::resource('indukkategories', 'App\Http\Controllers\IndukKategoriController');
    Route::get('indukKategori', 'App\Http\Controllers\IndukKategoriController@dataIndukKategori');
    Route::get('/indukKategori/edit/{id}', 'App\Http\Controllers\IndukKategoriController@edit');
    Route::post('/indukKategori/update','App\Http\Controllers\IndukKategoriController@update');
    Route::post('/indukKategori/store','App\Http\Controllers\IndukKategoriController@store');
    Route::get('/indukKategori/destroy/{id}','App\Http\Controllers\IndukKategoriController@destroy');
    Route::post('/indukKategori/import_excel', 'App\Http\Controllers\IndukKategoriController@import_excel');

    Route::resource('kategori', 'App\Http\Controllers\KategoriController');
    Route::get('dataKategori', 'App\Http\Controllers\KategoriController@dataKategori');
    Route::get('/dataKategori/edit/{id}', 'App\Http\Controllers\KategoriController@edit');
    Route::post('/dataKategori/update','App\Http\Controllers\KategoriController@update');
    Route::post('/dataKategori/store','App\Http\Controllers\KategoriController@store');
    Route::get('/dataKategori/destroy/{id}','App\Http\Controllers\KategoriController@destroy');
    Route::post('/dataKategori/import_excel', 'App\Http\Controllers\KategoriController@import_excel');
    
    Route::resource('subKategori', 'App\Http\Controllers\SubKategoriController');
    Route::get('subkategoridata', 'App\Http\Controllers\SubKategoriController@dataKategori');
    Route::get('/subKategori/edit/{id}', 'App\Http\Controllers\SubKategoriController@edit');
    Route::post('/subKategori/update','App\Http\Controllers\SubKategoriController@update');
    Route::post('/subKategori/store','App\Http\Controllers\SubKategoriController@store');
    Route::get('/subKategori/destroy/{id}','App\Http\Controllers\SubKategoriController@destroy');
    Route::post('/subKategori/import_excel', 'App\Http\Controllers\SubKategoriController@import_excel');

    Route::resource('mediatanam', 'App\Http\Controllers\MediaTanamController');
    Route::get('datamediatanam', 'App\Http\Controllers\MediaTanamController@dataMediaTanam');
    Route::get('/mediatanam/edit/{id}', 'App\Http\Controllers\MediaTanamController@edit');
    Route::post('/mediatanam/update','App\Http\Controllers\MediaTanamController@update');
    Route::post('/mediatanam/store','App\Http\Controllers\MediaTanamController@store');
    Route::get('/mediatanam/destroy/{id}','App\Http\Controllers\MediaTanamController@destroy');
    
    Route::resource('dataJenisTanaman', 'App\Http\Controllers\JenisTanamanController');
    Route::get('dataJenis', 'App\Http\Controllers\JenisTanamanController@dataJenisTanaman');
    Route::get('/dataJenisTanaman/edit/{id}', 'App\Http\Controllers\JenisTanamanController@edit');
    Route::post('/dataJenisTanaman/update','App\Http\Controllers\JenisTanamanController@update');
    Route::post('/dataJenisTanaman/store','App\Http\Controllers\JenisTanamanController@store');
    Route::get('/dataJenisTanaman/destroy/{id}','App\Http\Controllers\JenisTanamanController@destroy');

    Route::resource('soldout', 'App\Http\Controllers\SoldoutController');

    Route::get('barangAll', 'App\Http\Controllers\BarangController@databarangAll');


    Route::get('/select2-autocomplete-ajax', 'App\Http\Controllers\BarangController@dataAjax');
    Route::get('/status/bayar', 'App\Http\Controllers\PenjualanController@dataAjax');
    Route::get('update/status/bayar', 'App\Http\Controllers\PenjualanController@statusBayar');
    Route::get('/selectBarang', 'App\Http\Controllers\BarangController@selectBarang');
    Route::get('/barang_sale', 'App\Http\Controllers\PenjualanController@databarang');
    Route::resource('barang', 'App\Http\Controllers\BarangController');
    Route::get('/databarang', 'App\Http\Controllers\BarangController@databarang');
    Route::get('/loadKategori', 'App\Http\Controllers\BarangController@loadKategori');
    Route::post('/barang/store','App\Http\Controllers\BarangController@store');
    Route::post('/barang/update','App\Http\Controllers\BarangController@update');
    Route::get('/barang/show/{id}','App\Http\Controllers\BarangController@show');
    Route::get('/barang/edit/{id}','App\Http\Controllers\BarangController@edit');
    Route::get('/hapus/foto/barang','App\Http\Controllers\BarangController@softDeleteFotoBarang');
    Route::get('/hapus/foto/individu/{id}','App\Http\Controllers\BarangController@softDeleteFile');
    Route::get('barang/destroy/{id}', 'App\Http\Controllers\BarangController@destroy');
    Route::get('barang/posting/{id}', 'App\Http\Controllers\BarangController@posting');
    Route::get('barang/unposting/{id}', 'App\Http\Controllers\BarangController@unposting');
    
    Route::get('detail_barang', 'App\Http\Controllers\BarangController@detailBarang');
    
    
    Route::resource('nonTanaman', 'App\Http\Controllers\NonTanamanController');
    Route::post('/nonTanaman/store','App\Http\Controllers\NonTanamanController@store');
    Route::get('/nonTanaman/show/{id}','App\Http\Controllers\BarangController@show');
    Route::get('/datanontanaman', 'App\Http\Controllers\NonTanamanController@datanontanaman');
    
    Route::resource('level', 'App\Http\Controllers\LevelUserController');
    

    Route::post('barang/sale', 'App\Http\Controllers\PenjualanController@store');
    Route::get('barang/unsalle/{id}', 'App\Http\Controllers\PenjualanController@unsalle');

    Route::get('/json', 'App\Http\Controllers\ModulController@datajson')->name('json');
    Route::get('/data_modul', 'App\Http\Controllers\ModulController@modul');
    Route::post('/modul/store','App\Http\Controllers\ModulController@store');
    Route::get('/modul/edit/{id}','App\Http\Controllers\ModulController@edit');
    Route::post('/modul/update','App\Http\Controllers\ModulController@update');
    Route::get('/modul/hapus/{id}','App\Http\Controllers\ModulController@destroy');

    //sub modul
    Route::get('/Submodul/edit/{id}','App\Http\Controllers\ModulController@subedit');
    Route::post('/Submodul/update','App\Http\Controllers\ModulController@subupdate');
    Route::get('/Submodul/hapus/{id}','App\Http\Controllers\ModulController@hapussub');
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('logoutAdmin', 'App\Http\Controllers\LoginAdminController@logout')->name('logoutAdmin');
    
    //homepage
    Route::resource('homepage', 'App\Http\Controllers\SettingHomePageController');
    Route::post('gambar/homepage/store', 'App\Http\Controllers\SettingHomePageController@store');
    Route::post('gambar/homepage/store', 'App\Http\Controllers\SettingHomePageController@store');
    Route::post('hapus/gambar/homepage/{id}', 'App\Http\Controllers\SettingHomePageController@hapus');

    //manajemen user
    Route::resource('users', 'App\Http\Controllers\UserController');
    Route::get('dataUser', 'App\Http\Controllers\UserController@data');
    Route::post('tambahUser', 'App\Http\Controllers\UserController@store');
    Route::post('dataUser/update', 'App\Http\Controllers\UserController@update');
    Route::get('hapusUser/{id}', 'App\Http\Controllers\UserController@destroy');
    Route::get('riwayat/beli', 'App\Http\Controllers\UserController@riwayatBeli');
    //non tanaman
    Route::get('barang/nonTanaman/edit/{id}', 'App\Http\Controllers\nonTanamanController@edit');
    Route::post('barang/nonTanaman/update', 'App\Http\Controllers\nonTanamanController@update');
    
    Route::get('laporan/customer', 'App\Http\Controllers\LaporanCustomerController@index');
    Route::get('laporan/customer/export', 'App\Http\Controllers\LaporanCustomerController@toExcel');
    Route::get('laporan/stok/tersedia', 'App\Http\Controllers\LaporanStokTersediaController@index');
    Route::get('laporan/stok/tersedia/export', 'App\Http\Controllers\LaporanStokTersediaController@toExcel');
    Route::get('laporan/stok/terjual', 'App\Http\Controllers\LaporanStokTerjualController@index');
    Route::get('laporan/stok/terjual/export', 'App\Http\Controllers\LaporanStokTerjualController@toExcel');
    Route::post('laporan/stok/grafik', 'App\Http\Controllers\GrafikController@grafik');
    Route::post('laporan/penjualan/perbulan', 'App\Http\Controllers\GrafikController@penjualan_perbualan');
    Route::post('laporan/penjualan/penjualan_perjenis', 'App\Http\Controllers\GrafikController@penjualan_perjenis');
    Route::post('laporan/penjualan/penjualan_kategori', 'App\Http\Controllers\GrafikController@penjualan_kategori');

    
});
Route::resource('promo', 'App\Http\Controllers\PromoController');

Route::resource('profile', 'App\Http\Controllers\ProfileController');
Route::post('update/profile', 'App\Http\Controllers\ProfileController@update');


Route::get('produk/json','App\Http\Controllers\BarangController@jsonProduk');
Route::get('/', function () {
    return view('layouts.plantshop.home');
})->name('home');
Route::get('/chart', function () {
    return view('layouts.plantshop.shop.chart');
});
Route::get('/shopAll', function () {
    return view('layouts.plantshop.shop.view');
});
Route::get('/myOrder', function () {
    return view('layouts.plantshop.shop.myOrder');
});

Route::get('/konfirmasiPembayaran', function () {
    return view('layouts.plantshop.shop.konfirmasiPembayaran');
});

Route::get('/myAcount', function () {
    return view('layouts.plantshop.akun.profile');
});
Route::post('update/profile-v2', 'App\Http\Controllers\ProfileController@updatev2');



//hapus pesanan
Route::get('/hapus/pesanan/{id}','App\Http\Controllers\FullShopController@hapusPesanan');
//
Route::get('/batal/transaksi/{id}','App\Http\Controllers\FullShopController@batalTransaksi');
Route::get('/fullShop','App\Http\Controllers\FullShopController@index');
Route::get('/ProdukTerjual','App\Http\Controllers\FullShopController@ProdukTerjual');
Route::get('/promo','App\Http\Controllers\FullShopController@ProdukPromo');
Route::get('/about/toko','App\Http\Controllers\TokoController@index');
Route::get('/toko','App\Http\Controllers\TokoController@create');
Route::post('/toko/update','App\Http\Controllers\TokoController@update');
Route::get('/artikel/plantshop','App\Http\Controllers\ArtikelController@index');
Route::get('/detail/artikel/{id}','App\Http\Controllers\ArtikelController@show');
Route::post('/koment/artikel','App\Http\Controllers\ArtikelController@komentar');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('penjualan/storeShop', 'App\Http\Controllers\PenjualanController@storeShop');
Route::get('pembelian/bayar/{id}', 'App\Http\Controllers\PembelianBayarController@show');
Route::get('unOrder/{id}', 'App\Http\Controllers\PembelianBayarController@cancel');
// bank data frond end
Route::resource('bank_data', 'App\Http\Controllers\BankDataFrondController');
Route::get('/detail/bankdata/{id}','App\Http\Controllers\BankDataFrondController@show');
Route::get('/referensi_bankdata/{nama_tanaman}','App\Http\Controllers\BankDataFrondController@index');
//filtering kategori frond end
Route::get('get/data/{id_kategori}','App\Http\Controllers\FullShopController@index');
Route::post('cari/barang/','App\Http\Controllers\FullShopController@index');

//temporary order


Route::post('payments/notification', 'App\Http\Controllers\PaymentController@notification');
Route::get('payments/completed', 'App\Http\Controllers\PaymentController@completed');
Route::get('payments/failed', 'App\Http\Controllers\PaymentController@failed');
Route::get('payments/unfinish', 'App\Http\Controllers\PaymentController@unfinish');

//rajaongkir
Route::get('ongkir/provinsi', 'App\Http\Controllers\OngkirController@getProvinsi');
Route::get('ongkir/kota', 'App\Http\Controllers\OngkirController@getKota');
Route::post('ongkir/harga', 'App\Http\Controllers\OngkirController@getOngkir');



Route::get('/index', function () { return view('v2.home'); });
Route::get('/profile-v2', function () { return view('v2.profile'); });
Route::get('/about-v2', function () { return view('v2.about-v2'); });
//get produk
Route::get('/produk-v2','App\Http\Controllers\FullShopController@indexV2');
Route::get('/produk-v2/detail/{id}','App\Http\Controllers\FullShopController@detailProduk');
//end
//halaman order
Route::get('/order','App\Http\Controllers\DataOrderController@order');
//end
//komentar produk
Route::post('/produk-v2/getKomentar/{id}','App\Http\Controllers\FullShopController@getKomentar');
Route::post('/produk-v2/postKoment','App\Http\Controllers\KomentController@store');
Route::post('/produk-v2/removeKoment','App\Http\Controllers\KomentController@removeKoment');
//get jumlah pre order
Route::post('/getDataPreorder','App\Http\Controllers\DataOrderController@getDataPreOrder');
//end
//google login
Route::get('auth/google', 'App\Http\Controllers\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'App\Http\Controllers\GoogleController@handleGoogleCallback');
//end
//artikel
Route::get('/artikel-v2','App\Http\Controllers\ArtikelController@daftarArtikel');
Route::get('/detail/artikel-V2/{id}','App\Http\Controllers\ArtikelController@detailArtikel');
//komentar artikel
Route::post('/artikel-v2/getKomentar/{id}','App\Http\Controllers\ArtikelController@getKomentar');
Route::post('/artikel-v2/postKoment','App\Http\Controllers\ArtikelController@store');
Route::post('/artikel-v2/removeKoment','App\Http\Controllers\ArtikelController@removeKoment');
//end
//transaksi
Route::get('/transaksi-v2','App\Http\Controllers\TransaksiController@index');
Route::get('/transaksi-v2/batal/{id}','App\Http\Controllers\TransaksiController@pembatalanTransaksi');
//login
Route::post('loginPembeli', 'App\Http\Controllers\LoginUserController@loginPembeli');
//

