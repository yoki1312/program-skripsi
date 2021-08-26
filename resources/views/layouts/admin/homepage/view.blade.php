@extends('layouts.admin.template_view')
@section('konten')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Setting Homepage</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Setting</a></li>
                    <li class="breadcrumb-item active">Setting</li>
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
                        <h3 class="card-title">Section 1</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="from-group row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form action="/gambar/homepage/store" method="POST" autocomplete="off"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="control-group after-add-more">
                                        <div class="container-fluid">
                                            <div class="card card-default">
                                                <div class="card-header ">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12">
                                                            <div class="row">
                                                                @php $y = 1; @endphp
                                                                @foreach($data as $d)
                                                                <div class="col-lg-4 col-sm-4">
                                                                    <label for="input">Gambar {{ $y }}</label>
                                                                    <div class="file-loading">
                                                                        <input id="input" name="foto[]" type="file"
                                                                            class="images{{ $y }}">
                                                                    </div>
                                                                    <button id="{{ $d->id_homepage }}" type="button"
                                                                        class="btn btn-sm btn-danger btn-hapus"><i
                                                                            class="fa fa-trash"></i> Hapus
                                                                        Gambar</button><br>
                                                                    <label>Keterangan</label><br>
                                                                    <input type="text" name="judul[]"
                                                                        class="form-control form-control-sm"
                                                                        placeholder="Judul" value="{{ $d->judul }}" />
                                                                    <br>
                                                                    <br>
                                                                    <input hidden name="id_homepage[]" type="text"
                                                                        value="{{ $d->id_homepage }}" />
                                                                    <input hidden name="foto_lama[]" type="text"
                                                                        class="value{{ $y }}"
                                                                        value="{{ asset('upload/homepage/'.$d->gambar) }}" />
                                                                    <textarea name="uraian[]" class="form-control"
                                                                        id="exampleFormControlTextarea1">{{ $d->uraian }}</textarea>
                                                                </div>
                                                                <?php $y++ ?>
                                                                @endforeach
                                                                @for($x= $y ; $x <= 6; $x++) <div
                                                                    class="col-lg-4 col-sm-4">
                                                                    <input hidden name="id_induk[]" type="text" value="1" />
                                                                    <label for="input">Gambar {{ $x }}</label>
                                                                    <input hidden name="id_induk[]" type="text"
                                                                        value="1" />
                                                                    <div class="file-loading">
                                                                        <input id="input" name="foto[]" type="file"
                                                                            class="images{{ $x }}">
                                                                    </div>
                                                                    <label>Keterangan</label><br>
                                                                    <input type="text" name="judul[]"
                                                                        class="form-control form-control-sm"
                                                                        placeholder="Judul" />
                                                                    <br>
                                                                    <br>
                                                                    <textarea name="uraian[]" class="form-control"
                                                                        id="exampleFormControlTextarea1">#plantshop.id</textarea>
                                                            </div>
                                                            @endfor

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
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <div class="row">
                    <div class="col-12">
                        <h3 class="card-title">Section 2</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="from-group row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form action="/gambar/homepage/store" method="POST" autocomplete="off"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="control-group after-add-more">
                                        <div class="container-fluid">
                                            <div class="card card-default">
                                                <div class="card-header ">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12">
                                                            <div class="row">
                                                                @php $xy = 1; @endphp
                                                                @foreach($kecil as $d)
                                                                <input hidden name="id_induk[]" type="text" value="2" />
                                                                <div class="col-lg-3 col-sm-3">
                                                                    <label for="input">Gambar {{ $xy }}</label>
                                                                    <div class="file-loading">
                                                                        <input id="input" name="foto[]" type="file"
                                                                            class="imagesz{{ $xy }}">
                                                                    </div>
                                                                    <button id="{{ $d->id_homepage }}" type="button"
                                                                        class="btn btn-sm btn-danger btn-hapus"><i
                                                                            class="fa fa-trash"></i> Hapus
                                                                        Gambar</button><br>
                                                                    <label>Keterangan</label><br>
                                                                    <input type="text" name="judul[]"
                                                                        class="form-control form-control-sm"
                                                                        placeholder="Judul" value="{{ $d->judul }}" />
                                                                    <br>
                                                                    <br>
                                                                    <input hidden name="id_homepage[]" type="text"
                                                                        value="{{ $d->id_homepage }}" />
                                                                    <input hidden name="foto_lama[]" type="text"
                                                                        class="value-kecil{{ $xy }}"
                                                                        value="{{ asset('upload/homepage/'.$d->gambar) }}" />
                                                                    <textarea name="uraian[]" class="form-control"
                                                                        id="exampleFormControlTextarea1">{{ $d->uraian }}</textarea>
                                                                </div>
                                                                <?php $xy++ ?>
                                                                @endforeach
                                                                @for($x= $xy ; $x <= 4; $x++) <div
                                                                    class="col-lg-3 col-sm-3">
                                                                    <input hidden name="id_induk[]" type="text"
                                                                        value="2" />
                                                                    <label for="input">Gambar {{ $x }}</label>
                                                                    <div class="file-loading">
                                                                        <input id="input" name="foto[]" type="file"
                                                                            class="imagesz{{ $x }}">
                                                                    </div>
                                                                    <label>Keterangan</label><br>
                                                                    <input type="text" name="judul[]"
                                                                        class="form-control form-control-sm"
                                                                        placeholder="Judul" />
                                                                    <br>
                                                                    <br>
                                                                    <textarea name="uraian[]" class="form-control"
                                                                        id="exampleFormControlTextarea1">#plantshop.id</textarea>
                                                            </div>
                                                            @endfor

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
</section>
@endsection
