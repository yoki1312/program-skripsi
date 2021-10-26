@extends('v2.index')
@section('konten_area')
<main>
<div class="hero_single version_1"
    style="background: #9cddb0 url(v2/img/barside.png);  background-position:center; background-repeat:no-repeat; background-size: cover;">
    <div class="opacity-mask">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-8">
                    <h1>Plantshop.id</h1>
                    <p>Plant For Happines</p>
                    <form method="post" action="{{ url('cari/produk-v2') }}">
                        @csrf
                        <div class="row no-gutters custom-search-input">
                            <div class="col-lg-10">
                                <div class="form-group">
                                    <input name="nama_tanaman" class="form-control no_border_r" type="text"
                                        placeholder="Nama Tanaman">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <button class="btn_1 gradient" type="submit">Cari</button>
                            </div>
                        </div>
                        <!-- /row -->
                        
                    </form>
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <div class="wave hero"></div>
</div>
<!-- /hero_single -->

<div class="container margin_30_60">
    <div class="main_title center">
        <span><em></em></span>
        <h2>Kategori</h2>
        <!-- <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p> -->
    </div>
    <!-- /main_title -->
    <div class="owl-carousel owl-theme categories_carousel">
        @foreach(Kategori() as $t)
        <div class="item_version_2">
            <a href="grid-listing-filterscol.html">
                <figure>
                    <span>{{ $t->jumlah_barang }}</span>
                    <img style="filter: brightness(50%);" src="{{ $t->link_gambar }}" data-src="{{ $t->link_gambar }}"
                        alt="" class="owl-lazy" width="350" height="450">
                    <div class="info">
                        <h3>{{$t->nama_kategori }}</h3>
                    </div>
                </figure>
            </a>
        </div>

        @endforeach
    </div>
    <!-- /carousel -->
</div>
<!-- /container -->

<div class="bg_gray">
    <div class="container margin_60_40">
        <div class="main_title">
            <span><em></em></span>
            <h2>Daftar Tanaman </h2>
            <p>Tanaman pembelian terbanyak.</p>
            <a href="{{ url('produk-v2') }}">Lihat semua &rarr;</a>
        </div>
        <div class="row add_bottom_25">
            @foreach(AllProdukOne() as $r)
            <div class="col-lg-6">
                <div class="list_home">
                    <ul>
                        <li>
                            <a href="{{ url('produk-v2/detail/'.$r->id_barang) }}">
                                <figure>
                                    <img src="{!! asset('upload/img_barang/'.$r->gambar_sampul) !!}"
                                        data-src="{!! asset('upload/img_barang/'.$r->gambar_sampul) !!}" alt=""
                                        class="lazy" width="350" height="233">
                                </figure>
                                <div
                                    style="position: absolute; top: 10px; right: 20px; background: #097209; border-radius: 11px; border: 1px solid black;">
                                    <span style="padding: 6px;" class="badge badge-success">Tersedia</span></div>
                                <em>{{ $r->nama_barang }}</em>
                                <h3>{{ $r->nama_latin}}</h3>
                                <small>{{ $r->kode }}</small>
                                <ul>
                                    <li><span class="ribbon off">{{ $r->diskon }}</span></li>
                                    <li>Harga {{ $r->hargaJual }}</li>
                                </ul>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
        <!-- /row -->
        <div class="banner lazy" data-bg="url('v2/img/banner_bg_desktop.jpeg')">
            <div class="wrapper d-flex align-items-center opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.3)">
                <div>
                    <small>FooYes Delivery</small>
                    <h3>We Deliver to your Office</h3>
                    <p>Enjoy a tasty food in minutes!</p>
                    <a href="grid-listing-filterscol.html" class="btn_1 gradient">Start Now!</a>
                </div>
            </div>
            <!-- /wrapper -->
        </div>
        <!-- /banner -->
    </div>
</div>
<!-- /bg_gray -->

<!-- <div class="shape_element_2">
    <div class="container margin_60_0">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box_how">
                            <figure><img src="{!! asset('v2/img/lazy-placeholder-100-100-white.png') !!}"
                                    data-src="{!! asset('v2/img/easyorder.jpeg') !!}" alt="" width="150" height="167"
                                    class="lazy"></figure>
                            <h3>Easly Order</h3>
                            <p>Faucibus ante, in porttitor tellus blandit et. Phasellus tincidunt metus lectus
                                sollicitudin.</p>
                        </div>
                        <div class="box_how">
                            <figure><img src="{!! asset('v2/img/lazy-placeholder-100-100-white.png') !!}"
                                    data-src="{!! asset('v2/img/how_2.svg') !!}" alt="" width="130" height="145"
                                    class="lazy"></figure>
                            <h3>Quick Delivery</h3>
                            <p>Maecenas pulvinar, risus in facilisis dignissim, quam nisi hendrerit nulla, id
                                vestibulum.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <div class="box_how">
                            <figure><img src="{!! asset('v2/img/lazy-placeholder-100-100-white.png') !!}"
                                    data-src="{!! asset('v2/img/how_3.svg') !!}" alt="" width="150" height="132"
                                    class="lazy"></figure>
                            <h3>Enjoy Food</h3>
                            <p>Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, a
                                feugiat eros.</p>
                        </div>
                    </div>
                </div>
                <p class="text-center mt-3 d-block d-lg-none"><a href="#0"
                        class="btn_1 medium gradient pulse_bt mt-2">Register Now!</a></p>
            </div>
            <div class="col-lg-5 offset-lg-1 align-self-center">
                <div class="intro_txt">
                    <div class="main_title">
                        <span><em></em></span>
                        <h2>Start Ordering Now</h2>
                    </div>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed imperdiet
                        libero id nisi euismod, sed porta est consectetur deserunt.</p>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                        nulla pariatur.</p>
                    <p><a href="#0" class="btn_1 medium gradient pulse_bt mt-2">Register</a></p>
                </div>
            </div>
        </div>
    </div>
</div> -->
</main>
<!-- /shape_element_2 -->
@endsection
