@extends('layouts.plantshop.template_view')
@section('konten')
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>bankdata</h3>
                    <ul>
                        <li><a href="index.html">Daftar</a></li>
                        <li>bankdata</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--shop  area start-->
<div class="shop_area" style="margin-top:100px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!--shop toolbar end-->
                <div class="row shop_wrapper grid_4">
                    @foreach($bankdata as $r)
                    <div class="col-lg-3 col-md-4 col-12 ">
                        <article class="single_product">
                            <figure>
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="{{ url('detail/bankdata/'.$r->id_bankdata) }}"><img
                                                    style="width:300px; height:250px;"
                                                    src="{{ asset('produk/sampul/'.$r->foto_sampul) }}"
                                                    alt=""></a>
                                            <div class="action_links">

                                            </div>
                                            <div class="action_links list_action">
                                                <ul>
                                                    <li class="quick_button"><a href="#" data-toggle="modal"
                                                            data-target="#modal_box" title="quick view"> <i
                                                                class="icon-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-footer text-muted card-info">
                                            <div class="product_content grid_content">
                                                <div class="product_price_rating">
                                                    <h4 class="product_name"><a
                                                            href="product-details.html">{{ $r->nama_tanaman }}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </article>
                    </div>
                    @endforeach
                </div>
                
                <div class="shop_toolbar t_bottom">
                    <div class="pagination" style="margin:5px;">
                        <br>
                        <ul>
                            {{ $bankdata->links() }}

                        </ul>
                        <br>
                    </div>
                </div>
                <br>
                <br>
                <!--shop toolbar end-->
                <!--shop wrapper end-->
            </div>
        </div>
    </div>
</div>
@endsection
