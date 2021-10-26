<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Http\Request;
use DB;

class PembelianBayarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = "select ta.*, sum(tb.hargaPenjualan) as total from penjualan ta LEFT JOIN detail_penjualan tb ON ta.id_penjualan = tb.id_penjualan GROUP BY ta.id_penjualan";
        $orders = DB::select($sql);

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sql = "select ta.*, sum(tb.hargaPenjualan) + IFNULL(tc.harga,0)  as total_penjualan from penjualan ta LEFT JOIN detail_penjualan tb ON ta.id_penjualan = tb.id_penjualan LEFT JOIN tbl_ongkir tc ON ta.id_penjualan = tc.id_penjualan WHERE ta.id_penjualan = '$id'";
        $order = DB::table( DB::raw("($sql) AS a"))->first();
        // printJSON($order);

        $customer = DB::table('users')->where('id', $order->id_users)->first();
        $snapToken = $order->payment_token;
        if (empty($snapToken)) {
            // Jika snap token masih NULL, buat token snap dan simpan ke database
            
            $midtrans = new CreateSnapTokenService($order, $customer);
            $snapToken = $midtrans->getSnapToken();
            DB::table('penjualan')->where('id_penjualan', $id)->update([
                'payment_token' => $snapToken->token,
                'payment_url' => $snapToken->redirect_url
            ]);
        }

        return view('layouts.plantshop.shop.pembayaran', compact('order', 'snapToken'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function cancel($id){
        DB::table('penjualan')->where('id_penjualan', $id)->delete();
        DB::table('detail_penjualan')->where('id_penjualan', $id)->delete();

        return redirect('/');
    }
}
