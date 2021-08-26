@extends('layouts.admin.template_view')
@section('konten')
<style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {

        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #grey;
    }

    #customers th {
        text-align: center;
        background-color: #154007;
        color: white;
    }

    .email,
    .phone {
        display: none;
    }

    .rb-email:checked~.email {
        display: inline;
    }

    .rb-phone:checked~.phone {
        display: inline;
    }
    .hidden {
    display: none;
    }
    .modal-dialog {
    width: 100%;
    max-width: none;
    height: 100%;
    margin: 0;
    }

    .modal-content {
    height: 100%;
    border: 0;
    border-radius: 0;
    }

    .modal-body {
    overflow-y: auto;
    }

</style>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Penjualan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
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
                        <h3 class="card-title">Penjualan </h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="from-group row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form action="/penjualan/store" method="POST" autocomplete="off"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="control-group ">
                                        <div class="form-row">

                                            <div class="col-lg-6 col-sm-12" id="wrapper">
                                                <label>Nama Customer</label>
                                                <input required class="form-control form-control-sm" type="text"
                                                    name="nama_customer" class="form-control ">
                                                <input readonly class="form-control form-control-sm jumlah_barang"
                                                    type="text" name="jumlah_barang" value="<?= count($barang) ?>"
                                                    hidden class="form-control ">
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <label>Alamat</label>
                                                <input required class="form-control form-control-sm" type="text"
                                                    name="alamat_customer" class="form-control ss" id="ss">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label>Catatan</label><br>
                                                <textarea name="catatan" class="form-control"
                                                    id="exampleFormControlTextarea1"
                                                    style="height: 30px !important;">#plantshop.id</textarea>

                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <label>Tanggal Pembelian</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="form-control form-control-sm"
                                                            class="input-group-text">
                                                            <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                        </div>
                                                    </div>
                                                    <input name="tanggal_penjualan" value="<?= date('d m Y') ?>" class="datepicker form-control form-control-sm ">

                                                </div>
                                            </div>
                                            <style>
                                                .select2-selection__rendered {
                                                    margin-top: -9px !important;
                                                }

                                                
                                            </style>
                                            <div class="col-lg-3 col-sm-6">
                                                <label>Customer</label>
                                                <select name="jenis_customer" style="width:100%"
                                                    class="jenisCustomer select2">
                                                    <option value="0">Personal</option>
                                                    <option value="1">Reseller</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <p style="font-size:20px;">Detail Barang</p>
                                        <hr>
                                        <div id="ayaa" class="form-row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table id="assa" class="table table-sm table-condensed text-center"
                                                        width="100%">
                                                        <thead>
                                                            <tr class="table-info">
                                                                <th>Nama Barang</th>
                                                                <th>Harga</th>
                                                                <th>Diskon <input type="checkbox">
                                                                    <div style="display:none;" class="aa">
                                                                        <input type="radio" name="bedStatus" id="persen"
                                                                            value="1">Persen
                                                                        <input checked="checked" type="radio"
                                                                            name="bedStatus" id="rupiah" value="2">
                                                                        Rupiah
                                                                    </div>

                                                                </th>
                                                                <th>Total Harga </th>
                                                                <th width="80px"><button class="btn btn-danger btn-circle"
                                                                        onclick="additem(); return false"><i
                                                                            class="fa fa-plus"></i></button></th>
                                                            </tr>
                                                        </thead>
                                                        <!--elemet sebagai target append-->
                                                        <tbody id="itemlist">
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td>Total</td>
                                                                <td class="text-right"><input readonly
                                                                        style="border:none;"
                                                                        data-inputmask="'alias': 'currency', 'prefix': ''"
                                                                        type="text" name="total" class="total jumlahHargaSemua rupiah">
                                                                </td>
                                                                <td></td>
                                                                <td class="text-right"><input readonly
                                                                        style="border:none;"
                                                                        data-inputmask="'alias': 'currency', 'prefix': ''"
                                                                        type="text" name="total"
                                                                        class="totalDiskon rupiah totalHargaSemua">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td colspan="1" class="text-right"></td>
                                                                <td> </td>
                                                                <td> </td>
                                                                <td colspan="1"><b>
                                                                        <p style="font-size:16px;" id="hemat"></p>
                                                                    </b>
                                                                </td>
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
                <a href="{{ url('barang') }}" type="button" class="btn btn-sm btn-danger"><i class="fa fa-ban"
                        aria-hidden="true"></i> Cancel</a>
                <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                    Simpan</button>
                </form>
            </div>

        </div>
    </div>
</section>
<div role="dialog" class="modal modal-fullscreen-xl" id="bankdata" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="padding:20px;">
            <div class="modal-header">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <label>&nbsp;</label>
                            <button onclick="reset()" type="button" class="reset btn-sm btn btn-info">
                                <i class="fa fa-refresh" aria-hidden="true"></i> Reset
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>

                        </div>
                        <div class="col-md-6">
                            <label>Jenis Barang </label>
                            <select width="100%" class="id_induk select2">
                                <option selected disabled>Pilih..</option>
                                <option value="1">Tanaman</option>
                                <option value="2">Non Tanaman</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <table id="sbdata" class="table table-sm table-bordered table-striped table-hover" style="width:100%;">
                <thead>
                    <tr class="text-center">
                        <th></th>
                        <th>Nama Tanaman</th>
                        <th>Harga</th>
                        <th>Diskon</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

@foreach($barang as $r)
<div class="modal fade" id="modal{{ $r->id_barang }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <table id="detailBarang{{ $r->id_barang }}" class="table table-sm table-bordered table-striped table-hover"
                style="width:100%;padding:30px;">
                <thead>
                    <tr>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endforeach
@endsection
