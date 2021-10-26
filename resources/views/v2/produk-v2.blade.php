@extends('v2.index')
@section('konten_area')
<main style="transform: none; margin-top:70px;">
    <div class="page_header element_to_stick">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block">
                    <h1>Ditemukan {{ getTotalBarang() }} Barang</h1>
                    <a href="#0" target="_top">Cari barang kesayangan anda</a>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-5">
                    <div class="search_bar_list">
                        <input type="text" class="form-control srch" placeholder="Cari berdasarkan nama barang">
                        <button type="submit" onclick="fetch_data(this)"><i class="icon_search"></i></button>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <div class="container margin_30_20" style="transform: none;">
        <div class="row" style="transform: none;">
            <aside class="col-lg-3" id="sidebar_fixed"
                style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

                <div class="theiaStickySidebar"
                    style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
                    <a href="#0" class="open_filters btn_filters" target="_top"><i
                            class="icon_adjust-vert"></i><span>Filters</span></a>
                    @csrf
                    <div class="filter_col">
                        <div class="inner_bt clearfix">Filters<a href="#" class="open_filters" target="_top"><i
                                    class="icon_close"></i></a></div>
                        <div class="filter_type">
                            <h4><a href="#filter_1" data-toggle="collapse" class="opened" target="_top">Sort</a>
                            </h4>
                            <div class="collapse" id="filter_1">
                                <ul>
                                    <li>
                                        <label class="container_radio">Harga: Rendah ke Tinggi
                                            <input <?= $sort_filter == 'low' ? 'checked' : '' ?> value="low"
                                                type="radio" name="filter_sort">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_radio">Harga : Tinggi ke Rendah
                                            <input <?= $sort_filter == 'high' ? 'checked' : '' ?> value="high"
                                                type="radio" name="filter_sort">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /filter_type -->
                        <div class="filter_type">
                            <h4><a href="#filter_2" data-toggle="collapse" class="closed" target="_top">Categories</a>
                            </h4>
                            <div class="collapse show" id="filter_2">
                                <ul>
                                    <label class="container_check">Tampilkan Semua
                                        <input <?= $id_kategori == '' ? 'checked' : '' ?> name="id_kategori" value=""
                                            type="radio">
                                        <span class="checkmark"></span>
                                    </label>
                                    @foreach(kategori() as $k)
                                    <li>
                                        <label class="container_check">{{ $k->nama_kategori }}
                                            <small>{{ $k->jumlah_barang }}</small>
                                            <input <?= $id_kategori == $k->id_kategori ? 'checked' : '' ?>
                                                name="id_kategori" value="{{ $k->id_kategori }}" type="radio">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- /filter_type -->
                        <p><button type="button" onclick="fetch_data(this)"
                                class=" btn_1 outline full-width">Filter</button></p>
                    </div>
                    <div class="resize-sensor"
                        style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;">
                        <div class="resize-sensor-expand"
                            style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                            <div
                                style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 295px; height: 1390px;">
                            </div>
                        </div>
                        <div class="resize-sensor-shrink"
                            style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                            <div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%">
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-12">
                        <h2 class="title_small">Top Categories</h2>
                        <div class="owl-carousel owl-theme categories_carousel_in listing owl-loaded owl-drag">
                            <div class="owl-stage-outer">
                                <div class="owl-stage"
                                    style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1590px; padding-left: 50px; padding-right: 50px;">

                                    @foreach(Kategori() as $t)
                                    <div class="owl-item active" style="width: 166.25px; margin-right: 20px;">
                                        <div class="item">
                                            <figure>
                                                <img tyle="filter: brightness(50%);" src="{{ $t->link_gambar }}"
                                                    data-src="{{ $t->link_gambar }}" alt="" class="owl-lazy"
                                                    style="opacity: 1;">
                                                <a href="#0" target="_top">
                                                    <h3>{{$t->nama_kategori }}</h3>
                                                </a>
                                            </figure>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><i
                                        class="arrow_left"></i></button><button type="button" role="presentation"
                                    class="owl-next"><i class="arrow_right"></i></button></div>
                            <div class="owl-dots disabled"></div>
                        </div>
                        <!-- /carousel -->
                    </div>
                </div>
                <!-- /row -->

                <div class="promo" style="background:#326a44;">
                    <h3>Promo gratis ongkir dengan belanja 2 kali dalam 1 hari</h3>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                    <i class="icon-food_icon_delivery"></i>
                </div>
                <!-- /promo -->
                <div class="row text-center">

                </div>
                <div class="row">
                    <div class="row" id="section-produk">
                        @include('v2.list-produk')
                    </div>
                    <!-- /strip grid -->
                </div>
                <!-- /row -->

            </div>
            <!-- /col -->
        </div>
    </div>
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
        $(document).on('click', '.add-to-cart', function () {
            var auth = $('meta[name="auth"]').attr('content');
            if (auth != null) {
                axios.post('/add-to-cart', {
                    produk_id: $(this).attr('produk-id')
                }).then((response) => {
                    var params = response.data;
                    console.log(params)
                    if (params.status == 200) {
                        $('#message').show()
                        setTimeout(function() {
                            $('#message').fadeOut('fast');
                        }, 3000);
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
        })

    });

    function fetch_data(page) {
        var id_kategori = $('input[name="id_kategori"]:checked').val();
        var sort_filter = $('input[name="filter_sort"]:checked').val();
        var nama_tanaman = $('.srch').val();
        $.ajax({
            url: "/produk-v2?page=" + page + '&id_kategori=' + id_kategori + '&filter_sort=' + sort_filter + '&nama_tanaman=' + nama_tanaman,
            type: "get",
            datatype: "html",
            success: function (data) {
                $('#section-produk').html(data);
            }
        });
    }

</script>
@endsection
