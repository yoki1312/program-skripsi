<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Midtrans\Config;
use DB;

class PaymentController extends Controller
{
    protected $serverKey;
	protected $isProduction;
	protected $isSanitized;
	protected $is3ds;

    public function __construct()
	{
		$this->serverKey = config('midtrans.server_key');
		$this->isProduction = config('midtrans.is_production');
		$this->isSanitized = config('midtrans.is_sanitized');
		$this->is3ds = config('midtrans.is_3ds');

		$this->_configureMidtrans();
	}

	public function _configureMidtrans()
	{
		Config::$serverKey = $this->serverKey;
		Config::$isProduction = $this->isProduction;
		Config::$isSanitized = $this->isSanitized;
		Config::$is3ds = $this->is3ds;
	}
    public function notification(Request $request){

		//get id_penjualan
		$order = DB::table('penjualan')->where('no_invoice', $request->order_id)->first();
		//end

		//insert notifikasi from midtrans
		$data = DB::table('notifikasi_payment')->insert([
			'order_id'=> $order->id_penjualan,
			'bank' => $request->bank,
			'approval_code' => $request->approval_code,
			'card_type' => $request->card_type,
			'gross_amount' => $request->gross_amount,
			'payment_type' => $request->payment_type,
			'status_code' => $request->status_code,
			'transaction_id' => $request->transaction_id,
			'transaction_time' => $request->transaction_time,
			'transaction_status' => $request->transaction_status
		]);
		//end

		if($request->status_code == '200'){
			//update status penjualan
			DB::table('penjualan')->where('id_penjualan',$order->id_penjualan)->update([
				'id_status_penjualan' => '1'
			]);
			//end
	
			//remove temporary order
			$detail_penjualan = DB::table('detail_penjualan')->where('id_penjualan',$order->id_penjualan)->get();
			foreach($detail_penjualan as $d){
				DB::table('temporary_order')->where('id_barang',$d->id_barang)->delete();
			}
			//end
			
			//send mail
			$sendMaiil = [
				'title' => 'Pemberitahuan Pembayaran',
				'body' => 'Pembayaran transaksi '.$request->order_id. ' total '.$request->gross_amount.' berhasil!!'
			];

			$user = DB::table('users')->where('id',$order->id_users)->first();
		   
			\Mail::to($user->email)->send(new \App\Mail\SendMail($sendMaiil));
			//

		}


		return response($data, 200);
    }

    public function completed(Request $request){
       return redirect('/transaksi-v2');
    }
    public function unFinish(Request $request){

    }
    public function failed(Request $request){

    }

    public function kodePembayaran(){
        $kode = '';
        $parrent = "Pembayaran";
        $arrCode = date('Ymd').$parrent;
        return $arrCode;
    }
}
