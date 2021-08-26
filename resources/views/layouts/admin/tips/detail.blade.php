@extends('layouts.admin.template_view')
@section('konten')
<style>
    .file-caption-main{
        display:none;
    }
    .kv-file-remove {
        display:none;
    }
</style>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail Tips</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Tips & Artikel</a></li>
                    <li class="breadcrumb-item active">Detail</li>
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
                        <h3 class="card-title">Detail Tips & Artikel</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="from-group row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                               @foreach($data as $r)
                                    <div class="control-group after-add-more">
                                        <div class="container-fluid">
                                            <div class="card card-default">
                                                <div class="card-header ">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-sm-12">
                                                                    <label>Judul</label>
                                                                    <input value="{{ $r->judul }}" readonly type="text" name="judul"
                                                                        class="form-control ">
                                                                    </div>
                                                                    <div class="col-lg-6 col-sm-12">
                                                                        <label>Kategori</label><br>
                                                                        <input value="{{ $r->nama_kategori }}" readonly type="text" name="judul"
                                                                            class="form-control ">
                                                                </div>
                                                                <div class="col-sm-12" style="margin-top:10px;">
                                                                    <label>Tips</label><br>
                                                                    <textarea readonly name="isi"
                                                                        id="isi">{!! $r->isi !!}</textarea>
                                                                        

                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <label for="input">Gambar</label>
                                                                    <input type="hidden" class="artikel_img" value="{{ asset('upload/artikel/'.$r->foto_tips) }}">
											                        <input id="file-0a" name="bom_image" type="file">

                                                                    <br>
                                                                </div>
                                                                <div class="col-lg-12 col-sm-12">
                                                                <label>Hastag</label><br>
                                                                     <textarea name="hastag" readonly class="form-control" id="exampleFormControlTextarea1" >{{ $r->hastag }}</textarea>
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
                                    <a type="button" href="/tipss/edit/{{$r->id_tips }}" class="btn btn-primary btn-sm"> <i class="fa fa-edit" aria-hidden="true"> Edit</i></a>
                                   
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection