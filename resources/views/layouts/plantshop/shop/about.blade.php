@extends('layouts.plantshop.template_view')
@section('konten')
@foreach($toko as $t)
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>Tentang Plantshop.id</h3>
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li>Tentang Plantshop.id</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="about_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <figure>
                    <div class="about_thumb">
                        <img style="width:100%; height:700px;" src="{{ asset('upload/about/'.$t->gambar) }}" alt="">
                    </div>
                    <figcaption class="about_content">
                        <h1>{{ $t->judul }}</h1>
                        <p>{{ $t->about }}</p>
                    </figcaption>
                </figure>
            </div>
        </div>
    </div>
</section>
@endforeach
<div class="product_area  mb-95">
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
                          <div class="col-lg-3">
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
