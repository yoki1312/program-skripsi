@extends('v2.index')
@section('konten_area')
<main>
    <div class="page_header blog element_to_stick" style="margin-top:70px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block">
                    <h1>Artikel</h1>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-5">
                    <div class="search_bar_list">
                        <input type="text" class="form-control srch" placeholder="Cari Artikel.....">
                        <button onclick="fetch_data(this)" type="SUBMIT"><i class="icon_search"></i></button>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /page_header -->

    <div class="container margin_60_20">
        <div class="row">
            <div class="col-lg-9">
                <div class="row" id="section-artikel">
                    @include('v2.list-artikel')
                </div>
            </div>
            <!-- /col -->

            <aside class="col-lg-3">
                <div class="widget">
                    <div class="widget-title first">
                        <h4>Latest Post</h4>
                    </div>
                    <ul class="comments-list">
                    <?php $counter = 0; ?>
                    @foreach($data as $d)
                        <li>
                            <div class="alignleft">
                                <a href="#0"><img src="{{ asset('upload/artikel/'.$d->foto_tips) }}" alt=""></a>
                            </div>
                            <small>{{$d->nama_kategori}} - {{ date('d F Y', strtotime($d->created_at)) }}</small>
                            <h3><a href="#" title="">{{ $d->judul }}</a></h3>
                        </li>
                        @php 

                        if ($counter == 4) 
                            break;

                        $counter++;

                        @endphp
                   @endforeach
                    </ul>
                </div>
                <!-- /widget -->
                <div class="widget">
                    <div class="widget-title">
                        <h4>Categories</h4>
                    </div>
                    <ul class="cats">
                        <li><input checked type="radio" value="" name="kategori" /><a >  &nbsp;Tampil Semua</a></li>
                        @foreach(Kategori() as $d)
                        <li><input value="{{ $d->id_kategori }}" type="radio" name="kategori" /><a> &nbsp;{{ $d->nama_kategori }} <span>({{ $d->jumlah_barang }})</span></a></li>
                        @endforeach
                    </ul>
                    <button class="btn btn-success btn-sm" onclick="fetch_data(this)">Filter</button>
                </div>
            </aside>
            <!-- /aside -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->

</main>
@endsection
@section('js')
<script>
    $(document).ready(function () {

        $(document).on('click', '.page-link', function (event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

    });

    function fetch_data(page) {
        var id_kategori = $('input[name="kategori"]:checked').val();
        var srch = $('.srch').val();
        $.ajax({
            url: "/artikel-v2?page=" + page + '&id_kategori=' + id_kategori + '&srch=' + srch,
            type: "get",
            datatype: "html",
            success: function (data) {
                $('#section-artikel').html(data);
                var cek_data =  $('.section-artikel-check').length
                if(cek_data == 0 ){
                $('#section-artikel').append(`<div class="col-md-12 section-artikel-check">
                    <article class="blog text-center">
                        <div class="post_info">
                        <p>Belum Ada Artile</p>
                        </div>
                    </article>
                    <!-- /article -->
                </div>`);

                }
                
            }
        });
    }

</script>
@endsection
