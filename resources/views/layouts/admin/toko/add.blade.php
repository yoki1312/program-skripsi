@extends('layouts.admin.template_view')
@section('konten')
@foreach($toko as $t)

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>About Plantshhop</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Plantshop</a></li>
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
                        <h3 class="card-title">Plantshop</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="from-group row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form action="/toko/update" method="POST" autocomplete="off"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="control-group after-add-more">
                                        <div class="container-fluid">
                                            <div class="card card-default">
                                                <div class="card-header ">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12">
                                                            <div class="row">
                                                                <input type="hidden" name="id_toko" value="{{ $t->id_toko }}" />
                                                                <input type="hidden"  name="old_img" value="{{ $t->gambar }}" />
                                                                <input type="hidden" class="sampul" value="{{ asset('upload/about/'.$t->gambar) }}" />
                                                                <div class="col-lg-12 col-sm-12">
                                                                    <label>Judul</label><br>
                                                                    <textarea name="judul" class="form-control"
                                                                        id="exampleFormControlTextarea1">{{ $t->judul }}</textarea>
                                                                </div>
                                                                <div class="col-lg-12 col-sm-12">
                                                                    <label>Alamat</label><br>
                                                                    <textarea name="alamat" class="form-control"
                                                                        id="exampleFormControlTextarea1">{{ $t->alamat }}</textarea>
                                                                </div>
                                                                <div class="col-lg-12 col-sm-12">
                                                                    <label>Maps Toko</label><br>
                                                                    <input name="maps" class="form-control" value="{{ $t->maps }}" />
                                                                </div>
                                                                <div class="col-lg-12 col-sm-12">
                                                                    <label>Nomor Pusat Bantuan</label><br>
                                                                    <input name="kontak" class="form-control" value="{{ $t->kontak }}" />
                                                                </div>
                                                                <div class="col-lg-12 col-sm-12">
                                                                    <label>Email Pusat Bantuan</label><br>
                                                                    <input name="email" class="form-control" value="{{ $t->email }}">
                                                                </div>
                                                                <div class="col-lg-12 col-sm-12">
                                                                    <label>About</label><br>
                                                                    <textarea name="about" class="form-control"
                                                                        id="exampleFormControlTextarea1">{{ $t->about }}</textarea>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <label for="input">Gambar</label>
                                                                    <div class="file-loading">
                                                                        <input id="input" name="gambar" type="file">
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

                            <a href="{{ url('tipss') }}" type="button" class="btn btn-sm btn-danger"><i
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
@endforeach
@endsection
