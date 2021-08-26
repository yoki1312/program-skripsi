@extends('layouts.admin.template_view')
@section('konten')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Home Dekor</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home Dekor</a></li>
                    <li class="breadcrumb-item active">Home Dekor</li>
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
                    <h3 class="card-title"><a href="{{ url('homedekor/create') }}" type="button" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                Tambah baru</a></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="ngoding" class="table table-sm table-bordered table-striped table-hover"
                            style="width:100%;  border-style: none;">
                            <thead>
                                <tr class="text-center">
                                 
                                    <th>Foto</th>
                                    <th width="120px"></th>
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
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <span class="modal-title" id="exampleModalLongTitle">Kategori</span>
            <input name="nama_kaegori" id="namakategori" class="form-control form-control-sm" type="text">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-save btn-sm btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="edit-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <span class="modal-title" id="exampleModalLongTitle">Kategori</span>
            <input name="nama_kaegori" id="nama_kategori" class="form-control form-control-sm" type="text">
            <input hidden name="id_kategori" id="id_kategori" class="form-control form-control-sm" type="text">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-update btn-sm btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
