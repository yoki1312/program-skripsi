@extends('layouts.admin.template_view')
@section('konten')
@foreach($barang as $b)
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Barang</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none">
                    </h3>
                    <div class="col-12">
                        <img src="{{ url('produk/sampul',$b->gambar_sampul) }}" class="product-image" alt="Product Image">
                    </div>
                    <div class="col-12 product-image-thumbs">
                        @foreach($barang_detail as $dt)
                        <div class="product-image-thumb"><img src="{{ url('produk/detailProduk',$dt->foto) }}" alt="Product Image">
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-12 col-sm-6">
                    <h3 class="my-3">
                        {{ $b->nama_barang}}
                    </h3>
                    <p>{{ $b->deskripsi}}</p>

                    <hr>


                    <div class="bg-gray py-2 px-3 mt-4">
                        <h2 class="mb-0"> Harga
                            {{ $b->harga}}
                        </h2>
                        <h4 class="mt-0">
                            Stock
                            <small> {{ $b->stock}}</small>
                        </h4>
                    </div>

                    <div class="mt-4 product-share">
                        <a href="#" class="text-gray">
                            <i class="fab fa-facebook-square fa-2x"></i>
                        </a>
                        <a href="#" class="text-gray">
                            <i class="fab fa-twitter-square fa-2x"></i>
                        </a>
                        <a href="#" class="text-gray">
                            <i class="fas fa-envelope-square fa-2x"></i>
                        </a>
                        <a href="#" class="text-gray">
                            <i class="fas fa-rss-square fa-2x"></i>
                        </a>
                    </div>

                </div>
            </div>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
@endforeach
@endsection
