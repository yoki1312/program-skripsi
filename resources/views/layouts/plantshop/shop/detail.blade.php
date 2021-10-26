@extends('v2.index')
@section('konten_area')
<main class="bg_gray" style="transform: none; margin-top:70px;">
    <div class="container margin_60_20">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8">
                <div class="theiaStickySidebar"
                    style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 810px;">
                    <div class="box_order">
                        <div class="head">
                            <h3>Detail Barang</h3>
                        </div>
                        <!-- /head -->
                        <div class="main">
                            <div class="review_card">
                                <div class="row">
                                    <div class="col-md-10 review_content">

                                        <h4>"{{ $data->nama_barang }}"</h4>
                                        <small><b>{{ $data->nama_kategori }}</b></small>
                                        <p>{{ $data->deskripsi }}</p>
                                        <div class="clearfix add_bottom_15">
                                            <span class="rating">Rp. {{ number_format($data->hargaJual,0) }}</span>
                                        </div>
                                        <ul style="">
                                            <li
                                                style="display: inline-block;/* background: green; */border-radius: 12px;border: 1px green solid;font-c: white;">
                                                <button class="btn btn-sm btn-default"><i class="icon_like"></i>
                                                    &nbsp;<span>Like</span></button></li>
                                            <li
                                                style="display: inline-block;/* background: green; */border-radius: 12px;border: 1px green solid;font-c: white;">
                                                <button class="btn btn-sm btn-default"><i class="icon_dislike"></i>
                                                    &nbsp;<span>Not Like</span></button>
                                            </li>
                                            <li
                                                style="display: inline-block;/* background: green; */border-radius: 12px;border: 1px green solid;font-c: white;">
                                                <button class="btn btn-sm btn-default btn-add-komentar"><i
                                                        class="arrow_back"></i>
                                                    &nbsp;<span>Tambah komentar</span></button>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                                <!-- /row -->
                            </div>
                            <div class="review_card add-komentar-section"
                                style="padding: 10px 25px 10px 25px; display:none">
                                <label>Tambah Komentar Anda</label>
                                <div class="row">
                                    <textarea cols="3" class="form-control komentar-user"></textarea>
                                </div>
                                <br>
                                <div class="row">
                                    <button produk-id="{{ $data->id_barang }}" width="100%"
                                        class="btn btn-info" onclick="postKoment()">Kirim Komentar</button>
                                </div>
                                <!-- /row -->
                            </div>

                        </div>
                    </div>
                    <br>
                </div>
                <!-- /box_order_form -->
                <div class="box_order_form">
                    <div class="head">
                        <div class="title">
                            <h3>Spesifikasi</h3>
                        </div>
                    </div>
                    <!-- /head -->
                    <main>
                        <div class="row">
                            <div class="col-sm-12" style=" margin-left: 20px; margin-top: 20px; ">
                                <div class="row add_bottom_30 d-flex align-items-center reviews">
                                    <div class="col-md-12 reviews_sum_details">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h6>Kebutuhan Air</h6>
                                                <div class="row">
                                                    <div class="col-xl-10 col-lg-9 col-9">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: 50%" aria-valuenow="90" aria-valuemin="0"
                                                                aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-2 col-lg-3 col-3"
                                                        style=" margin-left: -18px; margin-top: -10PX; ">
                                                        <strong>{{ $data->kebutuhanAir }}</strong></div>
                                                </div>
                                                <!-- /row -->
                                                <!-- /row -->
                                            </div>
                                            <div class="col-md-4">
                                                <h6>Kebutuhan Sinar</h6>
                                                <div class="row">
                                                    <div class="col-xl-10 col-lg-9 col-9">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: 95%" aria-valuenow="95" aria-valuemin="0"
                                                                aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-2 col-lg-3 col-3"
                                                        style=" margin-left: -18px; margin-top: -10PX; ">
                                                        <strong>{{ $data->kebutuhanSinar }}</strong></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <h6>Penempatan</h6>
                                                <div class="row">
                                                    <div class="col-xl-10 col-lg-9 col-9">
                                                        {{ $data->caraPerawatan }}
                                                    </div>
                                                </div>
                                                <!-- /row -->
                                                <!-- /row -->
                                            </div>
                                        </div>
                                        <!-- /row -->
                                    </div>
                                </div>

                            </div>

                        </div>
                    </main>
                </div>

                <!-- /box_order_form -->
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="theiaStickySidebar"
                    style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 810px;">

                    <div class="box_order text-center">
                        <div class="head">
                            <div class="title">
                                <h3>Foto Barang</h3>
                            </div>
                        </div>
                        <!-- /head -->
                        <div class="main">
                            <div class="row">
                                <img id="zoom1" src="{{ asset('upload/img_barang/'.$data->gambar_sampul) }}"
                                    data-zoom-image="{{ asset('upload/img_barang/'.$data->gambar_sampul) }}"
                                    alt="big-1">
                            </div>
                            <br>
                            <br>
                            <div class="row text-center">
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="buttons clearfix">
                                        <span class="magnific-gallery">
                                            <a href="{{ asset('upload/img_barang/'.$data->gambar_sampul) }}"
                                                class="btn_hero" title="Photo title" data-effect="mfp-zoom-in"><i
                                                    class="icon_image"></i>Lihat Detail Foto</a>
                                            @foreach($detail as $d)
                                            <a href="{{ asset('upload/img_detail_barang/'.$d->foto) }}"
                                                title="Photo title" data-effect="mfp-zoom-in"></a>
                                            @endforeach
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row text-center">
                        <div class="col-sm-12">
                            <button produk-id="{{ $data->id_barang }}" width="100%" class="btn btn-info add-to-cart"
                                n>Tambah Pesanan</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container margin_30_20">
        <div class="col-xl-8 col-lg-8">
            <div class="theiaStickySidebar"
                style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 810px;">

                <div class="box_order">
                    <div class="head">
                        <div class="title">
                            <h3>Komentar</h3>
                        </div>
                    </div>
                    <!-- /head -->
                    <div class="main">
                        <div id="reviews">

                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>

</main>
@endsection
@section('js')
<script>
    $(document).on('click', '.add-to-cart', function () {
        var auth = $('meta[name="auth"]').attr('content');
        if (auth != null) {
            axios.post('/add-to-cart', {
                produk_id: $(this).attr('produk-id')
            }).then((response) => {
                var params = response.data;
                console.log(params)
                if (params.status == 200) {
                    Swal.fire(
                        'Berhasil',
                        'Barang ditambahan kedalam keranjang belanja',
                        'success'
                    )
                } else {
                    Swal.fire('Barang Sudah Ada dikeranjang')
                }
                getPreOrder();
            }).catch((error) => {
                console.log(error.response)
            });
        } else {
            Swal.fire('Silahkan Login')
        }
    });
    $(document).on('click', '.btn-add-komentar', function () {
        $('.add-komentar-section').show();
    });
    $(document).on('click', '.btn-hapus-komentar', function () {
        var id_komentar = this.id;
        $.ajax({
            type: "POST",
            url: '{{ url('produk-v2/removeKoment') }}',
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "id_komentar": id_komentar
            },
            success: function (response) {
                getKomentProduk();
            }
        });
    });
    getKomentProduk();
    function getKomentProduk() {
        var section = $('#reviews');
        $.ajax({
            type: "POST",
            url: '{{ url('produk-v2/getKomentar/'.$data->id_barang) }}',
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                var i = 0;
                section.empty();
                var rp_order = 0;
                var templateKosong = `
                        <div class="review_card">
                            <div class="row">
                                <div class="col-md-12 review_content text-center">
                                    <p>Belum Ada Komentar Pada Produk Ini</p>
                                </div>
                                
                            </div>
                        </div>`;
                if(response.length != 0){
                    for (i = 0; i < response.length; i++) {
                        var data = response[i];
                        var template = `
                            <div class="review_card">
                                <div class="row">
                                    <div class="col-md-2 user_info">
                                        <figure> <img class="img-koment" src="/upload/foto_profile/` + data['foto_profile'] + `" alt="...">
                                        </figure>
                                    </div>
                                    <div class="col-md-10 review_content">
                                        <div class="clearfix add_bottom_15">
                                            <em>Komentar pada {{ date('d F Y',strtotime(` + data['created_at'] + `)) }}</em>
                                        </div>
                                        <h4>"` + data['name'] + `"</h4>
                                        <p>` + data['koment'] + `</p>
                                        <ul>
                                                <li><a type="button" class="btn-hapus-komentar" id="`+data['id_koment']+`"><span>Hapus Komentar</span></a></li>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>`;
                            section.append(template);
                    }

                }else{
                        section.append(templateKosong);
                }
            }
        });
    };
    function postKoment(){
        $.ajax({
            type: "POST",
            url: '{{ url('produk-v2/postKoment') }}',
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "komentar": $('.komentar-user').val(),
                "produk_id": {{ $data->id_barang }}
            },
            success: function (response) {
                getKomentProduk();
                $('.komentar-user').val('');
                $('.add-komentar-section').hide();
            }
        });
    }

</script>
@endsection
