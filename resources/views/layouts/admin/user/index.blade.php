@extends('layouts.admin.template_view')
@section('konten')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pengguna</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Manajemen Pengguna</a></li>
                    <li class="breadcrumb-item active">Pengguna</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#exampleModalCenter"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                Tambah baru</button></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="ngoding" class="table table-sm table-bordered table-striped table-hover"
                            style="width:100%;  border-style: none;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th>Total Pembelian</th>
                                    <th>Riwayat Pembelian</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="email" class="form-control nama-lengkap" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control email" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Level</label>
                    <select class="form-control level">
                        <option value="1">Admin</option>
                        <option value="">Pembeli</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control password" id="exampleInputPassword1"
                        placeholder="Password">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-save btn-sm btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editform" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="id-user" hidden />
                    <input type="email" class="form-control edit-nama-lengkap" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control edit-email" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Level</label>
                    <select class="form-control edit-level">
                        <option value="1">Admin</option>
                        <option selected value="">Pembeli</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password Baru</label>
                    <input type="password" class="form-control edit-password" id="exampleInputPassword1"
                        placeholder="Password">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="update btn btn-update btn-sm btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Delete -->
<div class="modal fade" id="delete_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Yakin akan dihapus ?
            </div>
            <div class="modal-footer hps">

            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Riwayat Pembelian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="dt" class="table table-sm table-bordered table-striped table-hover"
                    style="width:100%;  border-style: none;">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>No Transaksi</th>
                            <th>Tanggal Transaksi</th>
                            <th>Barang</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
