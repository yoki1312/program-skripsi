@extends('layouts.admin.template_view')
@section('konten')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Home Dekor</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home Dekor</a></li>
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
                        <h3 class="card-title">Tambah Home Dekor</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="from-group row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form action="/homedekor/store" method="POST" autocomplete="off"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="control-group after-add-more">
                                        <div class="container-fluid">
                                            <div class="card card-default">
                                                <div class="card-header ">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-sm-12">
                                                                    <label>Keterangan</label><br>
                                                                    <textarea name="keterangan" class="form-control"
                                                                        id="exampleFormControlTextarea1">#plantshop.id</textarea>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <label for="input">Gambar</label>
                                                                    <div class="file-loading">
                                                                        <input id="input" name="foto[]" type="file" multiple>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <br>

                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <br>

                            <a href="{{ url('homedekor') }}" type="button" class="btn btn-sm btn-danger"><i
                                    class="fa fa-ban" aria-hidden="true"></i> Cancel</a>
                            <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-floppy-o"
                                    aria-hidden="true"></i>
                                Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection
