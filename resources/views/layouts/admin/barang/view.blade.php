@extends('layouts.admin.template_view')
@section('konten')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tanaman</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item active">Tanaman</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><a href="{{ url('barang/create') }}" type="button"
                                class="btn btn-sm btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                Tambah baru</a></h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>Status : </label>
                        <div class="form-check form-check-inline">
                            <input checked class="form-check-input" type="radio" name="inlineRadioOptions"
                                id="inlineRadio1" value="">
                            <label class="form-check-label" for="inlineRadio1">Ready</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                value="1">
                            <label class="form-check-label" for="inlineRadio2">Sold Out</label>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">

                                <table id="ngoding" class="table table-sm table-bordered table-striped table-hover"
                                    style="width:100%; ">
                                    <thead>
                                        <tr class="text-center">
                                            <th></th>
                                            <th>Nama Tanaman</th>
                                            <th>Kode</th>
                                            <th width="200px">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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

<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" name="ok_button" id="ok_button" class="btn btn-sm btn-danger">OK</button>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

@endsection
