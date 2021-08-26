@extends('layouts.admin.template_view')
@section('konten')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Modul</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Setting</a></li>
                    <li class="breadcrumb-item active">Modul</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#exampleModalCenter"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                Tambah baru</button></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="modul" class="table table-sm table-bordered table-striped table-hover"
                            style="width:100%;  border-style: none;">
                            <thead>
                                <tr>
                                    <th>Modul</th>
                                    <th>No Urut</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Modul</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="ngoding" class="table table-sm table-bordered table-striped table-hover"
                            style="width:100%;  border-style: none;">
                            <thead>
                                <tr>

                                    <th></th>
                                    <th></th>
                                    <th></th>

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
                <form action="/modul/store" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Modul</label>
                        <input type="text" name="nama_modul" class="form-control form-control-sm"
                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Modul">
                        <label for="exampleInputEmail1">Link</label>
                        <input type="text" name="link" class="form-control form-control-sm" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <label for="exampleInputEmail1">Icon</label>
                        <input type="text" name="icon" class="form-control form-control-sm" id="exampleInputEmail1"
                            aria-describedby="emailHelp">

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Modul</label><br>
                            <select name="indukModul" style="width:100%" class="select2 "
                                id="exampleFormControlSelect1">
                                <option value="#">#</option>
                                @foreach($menu as $r)
                                <option value="{{ $r->id_modul }}">{{ $r->modul }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModul" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit No Urut Modul</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" autocomplete="off">
                <div class="form-group">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <input type="text" id="id" hidden />
                    <label for="exampleInputEmail1">Modul</label>
                    <input type="text"  class="form-control form-control-sm" id="nama_modul"
                        aria-describedby="emailHelp" readonly>
                    <label for="exampleInputEmail1">No Urut</label>
                    <input type="text" name="nama_modul" class="form-control form-control-sm" id="no_urut"
                        aria-describedby="emailHelp">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn no_urut_save btn-sm btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
