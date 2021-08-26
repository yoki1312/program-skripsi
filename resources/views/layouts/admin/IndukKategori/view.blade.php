@extends('layouts.admin.template_view')
@section('konten')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Kategori</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item active">Kategori</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        @if (session('error'))
                        <div class="alert alert-success">
                            {{ session('error') }}
                        </div>
                        @endif
                        <h3 class="card-title">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#exampleModalCenter"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                Tambah baru</button>
                            <button type="button" class="btn btn-sm btn-primary mr-5" data-toggle="modal"
                                data-target="#importExcel"><i class="fa fa-file" aria-hidden="true"></i> Import Data
                                Excel </button>


                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="ngoding" class="table table-sm table-bordered table-striped table-hover"
                            style="width:100%;  border-style: none;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
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
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <span class="modal-title" id="exampleModalLongTitle">Induk Kategori</span>
                <input name="nama_kaegori" id="nama_indukKategori" class="form-control form-control-sm" type="text">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-save btn-sm btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="edit-form" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                <input name="nama_kaegori" id="nama_indukKategori" class="form-control form-control-sm" type="text">
                <input hidden name="id_indukKategori" id="id_indukKategori" class="form-control form-control-sm" type="text">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-update btn-sm btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="importExcel" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="/indukKategori/import_excel" enctype="multipart/form-data">
        @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">File (.xls, .xlsx)</label>
                        <input type="file" class="form-control" id="input_file" name="file">
                        <p class="text-danger">{{ $errors->first('file') }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
