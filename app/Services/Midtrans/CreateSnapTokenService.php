<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;
use DB;
use Auth;

class CreateSnapTokenService extends Midtrans
{
	protected $order;

	public function __construct($order, $customer)
	{
		parent::__construct();

		$this->order = $order;
		$this->customer = $customer;
	}

	public function getSnapToken()
	{
		

		$item = array();  
		$id_penjualan = $this->order->id_penjualan;
		$detail_pembelian = DB::table('detail_penjualan')->leftjoin('barang','barang.id_barang','detail_penjualan.id_barang')->where('id_penjualan', $id_penjualan)->get();
		$data_ongkir = DB::table('tbl_ongkir')->where('id_penjualan',$id_penjualan)->first();
		foreach($detail_pembelian as $d){
			if($d->nama_barang != null){
				$item[] = array(
					'id_detail' => $d->id_detail, // primary key produk
					'price' => $d->hargaPenjualan, // harga satuan produk
					'quantity' => 1, // kuantitas pembelian
					'name' => $d->nama_barang
				);
			}
		};
		$ongkir[] = array(
			'id_detail' => $id_penjualan.$data_ongkir->id_ongkir.rand(1000,100000),
			'price'	=> $data_ongkir->harga,
			'quantity'	=> 1,
			'name'	=> 'Ongkos Kirim - ['.$data_ongkir->expedisi. ' - ' .$data_ongkir->layanan_expedisi.']'
		);
		$item = array_merge($item,$ongkir);

		$params = array(
			'transaction_details' => [
				'order_id' => $this->order->no_invoice,
				'gross_amount' => $this->order->total_penjualan
			],
			'customer_details' => [
				'first_name' => Auth::user()->name,
				'email' => Auth::user()->email,
				'phone' => Auth::user()->no_wa,
			],
			'item_details' => $item,
			'expiry' => [
				'unit'	=> \App\Models\ServiceMidtransModel::EXPIRY_UNIT,
				'duration'	=> \App\Models\ServiceMidtransModel::EXPIRY_DURATION
			],
		);
		
		
		// $params = array_merge($params, $item_details);
		// printJSON($params);
		$paymentUrl = \Midtrans\Snap::createTransaction($params);
		return $paymentUrl;
	}
}
