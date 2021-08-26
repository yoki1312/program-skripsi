@extends('layouts.admin.template_view')
@section('konten')
@foreach($penjualan as $r)

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail Penjualan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
                    <li class="breadcrumb-item active">Detail Penjualan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <div class="row">
                    <div class="col-12">
                        <a href="/penjualan/cetak/{{ $r->id_penjualan }}" class="btn btn-primary" target="_blank"><i class="fa fa-file"></i> CETAK
                            PDF</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="from-group row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="control-group ">
                                    <div class="form-row">
                                        <div class="col-lg-6 col-sm-12 text-left">
                                            <img src="{{ url('produk/logo.jpg') }}" alt="BTS" style="width:150px;"><br>
                                            <small style="font-size:14px;">Perum Semen Gresik Blok G246<br>Segunting Awikoen<br>HP/WA
                                                085604416860<br>ID @plantshop.id</small>
                                        </div>
                                        <div class="col-lg-6 col-sm-12 text-right">
                                           
                                            <p style="font-size:20px;"><b> Invoice {{ $r->no_invoice }}</b></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-row">
                                        <div class="col-lg-6 col-sm-12">
                                            <label>Nama Customer</label>
                                            <input required class="form-control form-control-sm" type="text"
                                                name="nama_customer" class="form-control " readonly
                                                value="{{ $r->nama_users }}">
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label>Alamat</label>
                                            <input required class="form-control form-control-sm" type="text"
                                                name="alamat_customer" class="form-control ss" id="ss" readonly
                                                value="{{ $r->alamat_users }}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-lg-6 col-sm-6">
                                            <label>Catatan</label><br>
                                            <textarea name="catatan" class="form-control"
                                                id="exampleFormControlTextarea1" style="height: 30px !important;"
                                                readonly>{{ $r->catatan }}</textarea>

                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <label>Tanggal Pembelian</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="form-control form-control-sm" class="input-group-text">
                                                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                                <input name="tanggal_penjualan"
                                                    value="<?= date('d-m-Y', strtotime($r->tgl_penjualan))?>" readonly
                                                    class=" form-control form-control-sm">

                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <p style="font-size:16px;">Detail Barang</p>
                                    <hr>
                                    <div id="ayaa" class="form-row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table id="assa"
                                                    class="table table-sm table-bordered table-striped table-hover"
                                                    width="100%">
                                                    <thead>
                                                        <tr class="bg-info text-center">
                                                            <th width="300px">Nama Barang</th>
                                                            <th width="300px">Harga</th>
                                                            <th width="0px">Diskon</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="itemlist">
                                                        @foreach($detailPenjualan as $res)
                                                        <tr>
                                                            <td class="text-center">{{ $res->nama_barang }}</td>
                                                            <td class="text-right">
                                                                {{ number_format($res->hargaJual,2) }}</td>
                                                            <td class="text-right">{{ $res->diskon }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td class="text-center">Total</td>
                                                            <td class="text-right"><input readonly style="border:none;"
                                                                    data-inputmask="'alias': 'currency', 'prefix': ''"
                                                                    type="text" name="total" class="total rupiah"
                                                                    value="{{ $r->total }}">
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <hr>
            </div>

        </div>
    </div>
</section>
@endforeach
@endsection
