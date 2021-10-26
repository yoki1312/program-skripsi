@extends('layouts.plantshop.template_view')
@section('konten')
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>Pembayaran</h3>
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li>Pembayaran Pesanan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="container pb-5 pt-5">
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="card shadow">
                <div class="card-header">
                    <h5>Data Order</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-condensed">
                        <tr>
                            <td>No Invoice Pembayaran</td>
                            <td><b>#{{ $order->no_invoice }}</b></td>
                        </tr>
                        <tr>
                            <td>Total Harga</td>
                            <td><b>Rp {{ number_format($order->total_penjualan, 2, ',', '.') }}</b></td>
                        </tr>
                        <tr>
                            <td>Status Pembayaran</td>
                            <td><b>
                                    @if ($order->id_status_penjualan <= 1) Menunggu Pembayaran @elseif ($order->
                                        id_status_penjualan == 2)
                                        Sudah Dibayar
                                        @else
                                        Kadaluarsa
                                        @endif
                                </b></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td><b>{{ $order->created_at }}</b></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card shadow">
                <div class="card-header">
                    <h5>Metode Pembayaran</h5>
                </div>
                <div class="card-body text-center">
                    @if ($order->id_status_penjualan <= 1) <div class="row">
                        <div class="col-sm-12">
                            <a href="{{ $order->payment_url }}" class="btn btn-default" id="pay-button">Pembayaran Via Online</a>
                            <br>
                            <br>
                        </div>
                        <div class="col-sm-12">
                            <a href="https://wa.me/6285730982703?text=Konfirmasi%20pembelian%20no-transaksi%20%<?= $order->no_invoice ?>"
                                class="btn btn-success" id="pay-button">Konfirmasi Manual Via Whatsaap</a>
                        </div>
                        <div class="col-sm-12">
                            <br>
                            <a href="{{ url('unOrder/'. $order->id_penjualan) }}" class="btn btn-danger"
                                id="pay-button">Batalkan Transaksi</a>
                        </div>
                </div>
                @else
                Pembayaran berhasil
                @endif
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection
@section('js')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
</script>

@endsection
