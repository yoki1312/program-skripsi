<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;
use DB;

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
		$detail_pembelian = DB::table('detail_penjualan')->leftjoin('barang','barang.id_barang','detail_penjualan.id_barang')->where('id_penjualan', $this->order->id_penjualan)->get();
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

		$params = array(
			'transaction_details' => [
				'order_id' => $this->order->no_invoice,
				'gross_amount' => $this->order->total_penjualan,
			],
			'customer_details' => [
				'first_name' => $this->customer->name,
				'email' => $this->customer->email,
				'phone' => $this->customer->no_wa,
			],
			'item_details' => $item
		);
		
		
		// $params = array_merge($params, $item_details);
		$snapToken = Snap::getSnapToken($params);
		// dd($snapToken);
		


		return $snapToken;
	}
}
