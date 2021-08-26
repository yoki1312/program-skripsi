  <!--slider area start-->
  @extends('layouts.plantshop.template_view')
  @section('konten')
  <!--slider area start-->
  <section class="slider_section slider_s_four">
      <div class="slider_area owl-carousel">
          @foreach(slide_bar() as $sd)
          @if($sd->id_induk == '1')
          <div class="single_slider d-flex align-items-center"
              data-bgimg="{{ asset('upload/homepage/'.$sd->gambar ) }}">
              <div class="container">
                  <div class="row">
                      <div class="col-12">
                          <div class="slider_content">
                              <span>{{ $sd->judul }} </span>
                              <p> {{ $sd->uraian }}</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          @endif
          @endforeach
      </div>
  </section>
  <!--slider area end-->

  <!--banner area start-->
  <div class="banner_area banner_four_top">
      <div class="container-fluid">
          <div class="row">
              @foreach(slide_bar() as $sd)
              @if($sd->id_induk == '2')
              <div class="col-lg-3 col-md-6 col-sm-6">
                  <figure class="single_banner">
                      <div class="banner_thumb">
                          <a href="shop.html"><img style="height: 220px;"
                                  src="{{ asset('upload/homepage/'.$sd->gambar ) }}" alt=""></a>
                          <div class="banner_content">
                              <h3>{{ $sd->judul }}</h3>
                              <h2>{{ $sd->uraian }}</h2>
                              <a href="{{ url('fullShop') }}">Shop Now</a>
                          </div>
                      </div>
                  </figure>
              </div>
              @endif
              @endforeach
          </div>
      </div>
  </div>
  <div class="product_area  mb-95">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <div class="product_header">
                      <div class="section_title">
                          <h2>Produk Kami</h2>
                      </div>
                  </div>
              </div>
          </div>
          <div class="tab-content">
              <div class="tab-pane fade show active" id="plant1" role="tabpanel">
                  <div class="row">
                      <div class="product_carousel product_column4 owl-carousel" style="margin-top:20px">
                          @foreach(AllProdukOne() as $r)
                          <div class="col-lg-12 col-md-12">
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
                      <div class="product_carousel product_column4 owl-carousel" style="margin-top:20px">
                          @foreach(AllProdukTwo() as $r)
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
          <div class="row">
              <div class="col-lg-12 col-sm-12 text-center">
                  <a href="{{ url('fullShop') }}" target="_blank"><u>Semua Produk</u></a>
              </div>
          </div>
      </div>
  </div>
  <!--product area end-->

  <!--banner fullwidth area-->

  <!--newsletter area end-->
  @endsection
