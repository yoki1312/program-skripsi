@extends('layouts.plantshop.template_view')
@section('konten')
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>Pesanan saya</h3>
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li>Pesanan saya</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="shop_area shop_fullwidth mt-100 mb-100">
        <div class="container">
            <div class="row">
                @foreach(pesananku() as $t)
                <div class="col-6">
                     <div class="row shop_wrapper grid_list">
                        <div class="col-12 ">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img src="{{ asset('upload/img_barang/'.$t->gambar_sampul) }}" alt=""></a>
                                       
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="" data-original-title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                <li class="compare"><a href="#" title="" data-original-title="Add to Compare"><i class="icon-sliders"></i></a></li>
                                                 <li class="wishlist"><a href="wishlist.html" title="" data-original-title="Add to Wishlist"><i class="icon-heart"></i></a></li>    
                                                <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box" title="" data-original-title="quick view"> <i class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="action_links list_action">
                                            <ul>  
                                                <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box" title="" data-original-title="quick view"> <i class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                   
                                    <div class="product_content list_content">
                                        <h4 class="product_name"><a href="product-details.html">No Transaksi {{ $t->no_invoice }}</a></h4>
                                        <h4 class="product_name"><a href="product-details.html">{{ $t->nama_barang }}</a></h4>
                                        <div class="price_box"> 
                                            <span class="current_price">{{ number_format($t->hargaJual - $t->diskon ,2) }}</span>
                                            <span class="old_price">{{ $t->diskon }}</span>
                                        </div>
                                        
                                        <div class="action_links list_action_right">
                                            <ul>
                                                @if($t->id_status_penjualan == 1)
                                                <button class="btn btn-sm btn-info"><a href="cart.html" title="" data-original-title="Add to cart">Pembayaran Sukses</a></button><br><small>Menunggu Konfirmasi</small>
                                                @elseif($t->id_status_penjualan == 5)
                                                <button class="btn btn-sm btn-success"><a href="cart.html" title="" data-original-title="Add to cart">Selesai</a></button>
                                                @else
                                                <button class="btn btn-sm btn-warning"><a href="cart.html" title="" data-original-title="Add to cart">Selesaikan Pembayaran</a></button>
                                               &nbsp; <a type="submit" href="{{ url('/batal/transaksi/'.$t->id_penjualan) }}" class="btn btn-sm btn-danger"> Batal</a>
                                                @endif
                                                 <!-- <li class="wishlist"><a href="wishlist.html" title="" data-original-title="Add to Wishlist"><i class="icon-heart"></i></a></li>   
                                                 <li class="compare"><a href="#" title="" data-original-title="Add to Compare"><i class="icon-sliders"></i></a></li>  -->

                                            </ul>
                                        </>
                                    </div>
                                </figure>
                            </article>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
