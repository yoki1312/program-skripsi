@extends('layouts.admin.template_view')
@section('konten')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>PLANTSHOP.ID</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="from-group row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <h5 class="card-header">Stok Barang</h5>
                            <div class="card-body">
                                <div id="piechart_3d"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <h5 class="card-header">Penjualan Perbulan</h5>
                            <div class="card-body">
                                <div id="laporan_perbulan"></div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <h5 class="card-header">Penjualan Perjenis Barang</h5>
                            <div class="card-body">
                                <div id="penjualan_perjenis"></div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <h5 class="card-header">Penjualan Tanaman Perkategori</h5>
                            <div class="card-body">
                                <div id="penjualan_kategori"></div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <h5 class="card-header">Transaksi Terakhir</h5>
                            <div class="card-body">
                                <table id="ngoding" class="table table-sm table-bordered table-striped table-hover"
                                    style="width:100%;  border-style: none;">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Kode Pembelian</th>
                                            <th>Nama Pembeli</th>
                                            <th>Jumlah Pembelian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no=1; ?>
                                        @foreach(get_last_buy() as $d)
                                        <tr>
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td>{{ $d->no_invoice }}</td>
                                            <td>{{ $d->name }}</td>
                                            <td class="text-right">{{ $d->pembelian }} Item</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if (session('status'))
<script>
    Swal.fire(
        'Login Sukses!',
        'Selamat Datang',
        'success'
    );

</script>
<?php unset($notif) ?>
@endif

@endsection
