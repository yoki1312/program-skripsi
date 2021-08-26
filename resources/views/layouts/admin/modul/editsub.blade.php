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
            <div class="col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Modul</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="ngoding" class="table table-sm table-bordered table-striped table-hover"
                            style="width:100%;  border-style: none;">
                            <form action="/Submodul/update" method="POST" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <thead>
                                    <tr>
                                        <th>Modul</th>
                                        <th>SubModul</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($submodul as $m)
                                    <tr>
                                        <input type="text" value="{{ $m->id_subModul }}" name="id_submodul" hidden />
                                        <td> <select class="select2 form-control form-control-sm" style="width:100%;" name="modul">
                                                <option value="{{ $m->id_modul }}"> {{ $m->modul }}</option>
                                                @foreach($md as $s)
                                                <option value="{{ $s->id_modul }}">{{ $s->modul}}</option>
                                                @endforeach

                                            </select></td>
                                        <td><input name="nama" type="text" class="form-control form-control-sm"
                                                value="{{ $m->SubModul }}" /></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>
                        <br>
                        <a href="{{ url('modul') }}" type="button" class="btn btn-sm btn-danger"><i class="fa fa-ban"
                                aria-hidden="true"></i> Cancel</a>
                        <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-floppy-o"
                                aria-hidden="true"></i>
                            Simpan</button>
                    </div>
                    </form>

                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection
