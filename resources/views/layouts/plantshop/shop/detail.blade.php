@extends('layouts.plantshop.template_view')
@section('konten')
@foreach($barang as $b)
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>Detail</h3>
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li>Detail Produk</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="product_details mt-100 mb-100"> <hr>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product-details-tab">
                    <div id="img-1" class="zoomWrapper single-zoom">
                        <a href="#">
                            <img id="zoom1" src="{{ asset('upload/img_barang/'.$b->gambar_sampul) }}"
                                data-zoom-image="{{ asset('upload/img_barang/'.$b->gambar_sampul) }}" alt="big-1">
                        </a>
                    </div>
                    <div class="single-zoom-thumb">
                        <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                            @foreach($barang_detail as $detail)
                            <li>
                                <a href="#" class="elevatezoom-gallery active" data-update=""
                                    data-image="{{ asset('upload/img_detail_barang/'.$detail->foto) }}"
                                    data-zoom-image="{{ asset('upload/img_detail_barang/'.$detail->foto) }}">
                                    <img src="{{ asset('upload/img_detail_barang/'.$detail->foto) }}" alt="zo-th-1" />
                                </a>

                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product_d_right">
                    <form action="#">

                        <h1><a href="#">{{ $b->nama_barang }}</a></h1>
                        <div class="price_box">
                            <span class="current_price">Rp. {{ number_format($b->hargaJual-$b->diskon,2) }}</span> <span
                                class="old_price">{{ $b->diskon }}</span>
                        </div>
                        <div class="product_desc">
                            <p>{{ $b->deskripsi }} </p>
                        </div>
                        @if( $b->status != '1')
                        <div class="product_variant quantity">
                            <button style="padding-top: 0px !important; margin:0px;"
                                class="add-to-cart btn btn-secondary btn-lg"
                                <?= isset(Auth::user()->id) ? '' : 'disabled' ?> type="button">Tambah Ke
                                Keranjang</button>


                        </div>
                        @endif
                        <div class="product_meta">
                            <span>Kategori: <a href="#">{{ $b->nama_kategori }}</a></span>
                        </div>

                    </form>
                    <div class="priduct_social">
                        <ul>
                            <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i> Like</a>
                            </li>
                            <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>
                            <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> save</a>
                            </li>
                            <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i>
                                    share</a></li>
                            <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i> linked</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--product details end-->

<!--product info start-->
<div class="product_d_info mb-90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_d_inner">
                    <div class="product_info_button">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                    aria-selected="false">Ulasan</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet"
                                    aria-selected="false">Spesifikasi</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#info" role="tab" aria-controls="info"
                                    aria-selected="false">Cara Perawatan</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade " id="info" role="tabpanel">
                            <div class="product_d_table">
                                <form action="#">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="first_child">Kebutuhan Air</td>
                                                <td>{{ $b->kebutuhanAir }}</td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Kebutuhan Sinar</td>
                                                <td>{{ $b->kebutuhanSinar }} </td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Cara Perawatan</td>
                                                <td>{{ $b->caraPerawatan }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="sheet" role="tabpanel">
                            <div class="product_d_table">
                                <form action="#">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="first_child">Panjang</td>
                                                <td>{{ $b->panjang }} Cm</td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Lebar</td>
                                                <td>{{ $b->lebar }} Cm</td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Tinggi</td>
                                                <td>{{ $b->tinggi }} Cm</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>

                        <div class="tab-pane fade show active" id="reviews" role="tabpanel">
                            <div class="reviews_wrapper">
                                @foreach($koment as $t)
                                <div class="reviews_comment_box">
                                    <div class="comment_thmb">
                                        <img src=" {{ asset('plantshop/assets/img/blog/comment2.jpg') }}" alt="">
                                    </div>
                                    <div class="comment_text">
                                        <div class="reviews_meta">
                                            <p><strong>{{ $t->name }}
                                                </strong>-<?= date('d F Y', strtotime($t->created_at)) ?></p>
                                            <span>{{ $t->koment }}</span>
                                        </div>
                                    </div>

                                </div>
                                @endforeach
                                <div class="comment_title">
                                    <h2>Tambah Ulasan </h2>
                                </div>
                                <?php if(!empty( Auth::user()->email)) : ?>
                                <div class="product_review_form">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-12">
                                                <input type="text" value="{{ $b->id_barang }}" hidden class="produk" />
                                                <label for="review_comment">Ulasan Anda </label>
                                                <textarea name="comment" id="review_comment"></textarea>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="author">Name</label>
                                                <input id="author" value="{{ Auth::user()->name }}" readonly
                                                    class="preview-name" type="text">

                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="email">Email </label>
                                                <input class="preview-email" value="{{ Auth::user()->email }}" readonly
                                                    id="email" type="text">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-info test">Kirim Ulasan</button>
                                    </form>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<div class="product_area mb-95">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_header">
                    <div class="section_title">
                        <h2>Produk Terbaru</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="plant1" role="tabpanel">
                <div class="row">
                    <div class="product_carousel product_column4 owl-carousel" style="margin-top:20px">
                        @foreach(newsProduk() as $r)
                        <div class="col-lg-12">
                            <div class="product_items">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img"
                                                        href="{{ url('detail/produk/'.$r->id_barang) }}"><img
                                                            style="width:300px; height:250px;"
                                                            src="{{ asset('upload/img_barang/'.$r->gambar_sampul) }}"
                                                            alt=""></a>
                                                    <!-- <div class="label_product">
                                                  <span class="label_sale">-7%</span>
                                              </div> -->
                                                    <div class="action_links">

                                                    </div>
                                                </div>
                                                <div class="card-footer text-muted card-info">
                                                    <figcaption class="product_content">
                                                        <div class="product_rating">

                                                        </div>
                                                        <h4 class="product_name"><a
                                                                href="product-details.html">{{ $r->nama_barang }}</a>
                                                        </h4>
                                                        <div class="price_box">
                                                            <span class="current_price">Rp.
                                                                {{ number_format($r->hargaJual,2) }}</span>
                                                            @if($r->diskon > 0)
                                                            <span class="old_price">Rp.
                                                                {{ number_format($r->diskon,2) }}</span>
                                                            @endif
                                                        </div>
                                                    </figcaption>
                                                </div>
                                            </figure>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
