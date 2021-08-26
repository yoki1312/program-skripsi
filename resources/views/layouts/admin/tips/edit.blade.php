@extends('layouts.admin.template_view')
@section('konten')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Tips</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Tips & Artikel</a></li>
                    <li class="breadcrumb-item active">Edit</li>
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
                        <h3 class="card-title">Edit Tips & Artikel</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="from-group row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form action="/tipss/update" method="POST" autocomplete="off"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @foreach($data as $res)
                                    <div class="control-group after-add-more">
                                        <div class="container-fluid">
                                            <div class="card card-default">
                                                <div class="card-header ">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12">
                                                            <div class="row">
                                                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                                                <input type="text" name="id_tips" class="id_tips" value="{{ $res->id_tips }}" hidden />
                                                                <div class="col-lg-6 col-sm-12">
                                                                    <label>Judul</label>
                                                                    <input required type="text" value="{{ $res->judul }}" name="judul"
                                                                        class="form-control ">
                                                                </div>
                                                                <div class="col-lg-6 col-sm-12">
                                                                <label>Kategori</label><br>
                                                                <select class="select2 form-control form-control-sm"
                                                                        style="width:100%;" name="id_kategori">
                                                                        <option value="{{ $res->id_kategori }}" selected >{{ $res->nama_kategori }}</option>
                                                                        @foreach($kategori as $s)
                                                                        <option value="{{ $s->id_kategori }}">
                                                                            {{ $s->nama_kategori}}</option>
                                                                        @endforeach

                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-12" style="margin-top:10px;">
                                                                    <label>Tips</label><br>
                                                                    <textarea required name="isi"
                                                                        id="keterangan"> {{ $res->isi }}</textarea>

                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <label for="input">Gambar</label>
                                                                    <input type="hidden" class="artikel_img" value="{{ asset('upload/artikel/'.$res->foto_tips) }}">
											                        <input id="file-0a" name="foto_tips" type="file">

                                                                    <br>
                                                                </div>
                                                                <div class="col-lg-12 col-sm-12">
                                                                <label>Hastag</label><br>
                                                                     <textarea name="hastag" class="form-control" id="exampleFormControlTextarea1" >{{ $res->hastag }}</textarea>
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
                                     @endforeach   
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