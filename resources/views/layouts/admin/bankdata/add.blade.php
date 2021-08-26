@extends('layouts.admin.template_view')
@section('konten')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Bank Data</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Bank Data</a></li>
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
                        <h3 class="card-title">Tambah Bank Data </h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="from-group row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form action="/bankddata/store" method="POST" autocomplete="off"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="control-group after-add-more">
                                        <div class="container-fluid">
                                            <div class="card card-default">
                                                <div class="card-header ">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-sm-12">
                                                                    <label>Nama Latin Tanaman</label>
                                                                    <input required class="form-control form-control-sm"
                                                                        type="text" name="nama_latin"
                                                                        class="form-control ">
                                                                </div>
                                                                <div class="col-lg-6 col-sm-12">
                                                                    <label>Nama Tanaman (Id)</label>
                                                                    <input required class="form-control form-control-sm"
                                                                        type="text" name="nama_tanaman"
                                                                        class="form-control ">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6 col-sm-12">
                                                                    <label>Kategori</label><br>
                                                                    <select class="select2 form-control form-control-sm"
                                                                        style="width:100%;" name="id_kategori">
                                                                        <option value="" selected disabled>Pilih
                                                                            Kategori</option>
                                                                        @foreach($kategori as $s)
                                                                        <option value="{{ $s->id_kategori }}">
                                                                            {{ $s->nama_kategori}}</option>
                                                                        @endforeach

                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-12">
                                                                    <label>Jenis Tanaman</label><br>
                                                                    <select class="select2 form-control form-control-sm"
                                                                        style="width:100%;" name="id_jenisTanaman">
                                                                        <option value="" selected disabled>Pilih
                                                                            Jenis Tanaman</option>
                                                                        @foreach($jenistanaman as $s)
                                                                        <option value="{{ $s->id_jenisTanaman }}">
                                                                            {{ $s->nama_jenisTanaman}}</option>
                                                                        @endforeach

                                                                    </select>
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6 col-sm-12">
                                                                    <label>Spesifikasi</label><br>
                                                                    <textarea name="spesifikasi" class="form-control"
                                                                        id="exampleFormControlTextarea1"
                                                                        style="height: 30px !important;"></textarea>
                                                                </div>
                                                                <div class="col-lg-3 col-sm-6">
                                                                    <label>Harga Minimum</label>
                                                                    <div class="input-group mb-2">
                                                                        <div class="input-group-prepend">
                                                                            <div class="form-control form-control-sm"
                                                                                class="input-group-text">Rp</div>
                                                                        </div>
                                                                        <input name="hargaMin"
                                                                            data-inputmask="'alias': 'currency', 'prefix': ''"
                                                                            type="text"
                                                                            class="rupiah form-control form-control-sm">

                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-sm-6">
                                                                    <label>Harga Maximum</label>
                                                                    <div class="input-group mb-2">
                                                                        <div class="input-group-prepend">
                                                                            <div class="form-control form-control-sm"
                                                                                class="input-group-text">Rp</div>
                                                                        </div>
                                                                        <input name="hargaMax"
                                                                            data-inputmask="'alias': 'currency', 'prefix': ''"
                                                                            type="text"
                                                                            class="rupiah form-control form-control-sm">

                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-4 col-sm-12 text-center">
                                                                    <label>Penempatan</label><br>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="caraPerawatan" id="inlineRadio1"
                                                                            value="indoor">
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio1">Indoor</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="caraPerawatan" id="inlineRadio2"
                                                                            value="outdoor">
                                                                        <label class="form-check-label"
                                                                            for="outdoor">Outdoor</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-sm-12 text-center">
                                                                    <label>Kebutuhan Sinar Matahari</label><br>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="kebutuhanSinar" id="high"
                                                                            value="high">
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio1">high</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="kebutuhanSinar" id="low" value="low">
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio2">Low</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-sm-12 text-center">
                                                                    <label>Kebutuhan Air</label><br>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="kebutuhanAir" id="high" value="high">
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio1">high</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="kebutuhanAir" id="low" value="low">
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio2">Low</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="kebutuhanAir" id="low" value="medium">
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio2">Medium</label>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-4 col-sm-12">
                                                                    <label>Media Tanam</label>
                                                                    <select class="select2 form-control form-control-sm"
                                                                        style="width:100%;" name="idMediaTanam">
                                                                        <option value="" selected disabled>Pilih
                                                                            Media Tanam</option>
                                                                        @foreach($mediaTanam as $s)
                                                                        <option value="{{ $s->id_mediaTanam }}">
                                                                            {{ $s->nama_mediaTanam}}</option>
                                                                        @endforeach

                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-8 col-sm-12">
                                                                    <label>Hastag</label><br>
                                                                    <textarea name="hastag" class="form-control"
                                                                        id="exampleFormControlTextarea1"
                                                                        style="height: 30px !important;">#plantshop.id</textarea>

                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-4 col-sm-12">
                                                                    <label for="input">Foto Sampul</label>
                                                                    <div class="file-loading">
                                                                        <input class="fs" name="foto_sampul"
                                                                            type="file">
                                                                    </div><br>

                                                                </div>
                                                                <div class="col-lg-8 col-sm-12">
                                                                    <label for="input">Detail Foto</label>
                                                                    <div class="file-loading">
                                                                        <input class="fs2" id="input" name="foto[]" type="file"
                                                                            multiple>
                                                                    </div><br>

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

                                    <a href="{{ url('bankddata') }}" type="button" class="btn btn-sm btn-danger"><i
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
