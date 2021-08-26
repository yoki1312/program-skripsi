@extends('layouts.plantshop.template_view')
@section('konten')
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>Detail</h3>
                    <ul>
                        <li><a href="index.html">Bank Data</a></li>
                        <li>Detail Bank Data</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="product_details mt-100 mb-100" <hr>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product-details-tab">
                    <div id="img-1" class="zoomWrapper single-zoom">
                        <a href="#">
                            <img id="zoom1" src="{{ asset('produk/sampul/'.$data->foto_sampul) }}"
                                data-zoom-image="{{ asset('produk/sampul/'.$data->foto_sampul) }}" alt="big-1">
                        </a>
                    </div>
                    <div class="single-zoom-thumb">
                        <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                            @foreach($detail as $detail)
                            <li>
                                <a href="#" class="elevatezoom-gallery active" data-update=""
                                    data-image="{{ asset('produk/detailProduk/'.$detail->foto) }}"
                                    data-zoom-image="{{ asset('produk/detailProduk/'.$detail->foto) }}">
                                    <img src="{{ asset('produk/detailProduk/'.$detail->foto) }}" alt="zo-th-1" />
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

                        <h1><a href="#">{{ $data->nama_tanaman }}</a></h1>
                        <div class="price_box">
                            <span class="current_price">Rp. {{ number_format($data->hargaMin,2) }} s/d {{ number_format($data->hargaMax,2) }}</span> 
                        </div>
                        <div class="product_desc">
                            <p>{{ $data->spesifikasi }} </p>
                        </div>
                        <div class="product_meta">
                            <span>Kategori: <a href="#">{{ $kategori->nama_kategori }}</a></span>
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
                                <a data-toggle="tab" href="#info" role="tab" aria-controls="info"
                                    aria-selected="false">Cara Perawatan</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active" id="info" role="tabpanel">
                            <div class="product_d_table">
                                <form action="#">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="first_child">Kebutuhan Air</td>
                                                <td>{{ $data->kebutuhanAir }}</td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Kebutuhan Sinar</td>
                                                <td>{{ $data->kebutuhanSinar }} </td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Cara Perawatan</td>
                                                <td>{{ $data->caraPerawatan }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
