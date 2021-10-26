@extends('v2.index')
@section('konten_area')
<main style="margin-top:70px">

    <!-- /secondary_nav -->
    <style>
        .table_wrapper {
            background-color: #fff;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -ms-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0px 22px 24px 0px rgb(46 51 51 / 5%);
            -moz-box-shadow: 0px 22px 24px 0px rgba(46, 51, 51, 0.05);
            box-shadow: 0px 22px 24px 0px rgb(46 51 51 / 5%);
        }

        .secondary_nav {
            width: 100%;
            background-color: #fff;
            border-top: 1px solid #ededed;
            padding: 20px 0;
            position: relative;
        }

        .secondary_nav ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .secondary_nav ul li {
            display: inline-block;
            margin-right: 15px;
            border-radius: 17px;
        }

        .secondary_nav ul li a {
            color: #444;
            -webkit-border-radius: 20px;
            -moz-border-radius: 20px;
            -ms-border-radius: 20px;
            border-radius: 20px;
            background-color: #000;
            background-color: rgba(0, 0, 0, 0.05);
            padding: 5px 15px;
        }

        .secondary_nav span {
            position: absolute;
            height: 7px;
            width: 100%;
            left: 0;
            bottom: 0;
            -webkit-box-shadow: 0px 5px 5px 0px rgb(0 0 0 / 5%);
            -moz-box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.05);
            box-shadow: 0px 5px 5px 0px rgb(0 0 0 / 5%);
        }

        .table.cart-list td figure img {
            width: 60px;
            height: auto;
        }

        .table.cart-list td {
            vertical-align: middle;
        }

        .table td,
        .table th {
            padding: .75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .align-items-center {
            -ms-flex-align: center !important;
            align-items: center !important;
        }

        .table.cart-list td p {
            margin: 0;
            font-size: 13px;
            font-size: 0.8125rem;
            color: #444;
        }

        .table.cart-list td h4 {
            margin: 0;
            font-size: 16px;
            font-size: 1rem;
        }

        .table.cart-list td figure {
            width: 60px;
            height: 60px;
            overflow: hidden;
            display: inline-block;
            float: left;
            margin: 0;
            margin-right: 15px;
            border: 1px solid #fff;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            -ms-border-radius: 3px;
            border-radius: 3px;
        }

    </style>
    <div class="bg_gray" id="accordion">
        <nav class="secondary_nav sticky_horizontal" style="">
            <div class="container">
                <ul id="secondary_nav">
                    <li><a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Transaksi Selesai</a></li>
                    <li><a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Transaksi Pending</a></li>
                </ul>
            </div>
            <span></span>
        </nav>
        <div class="container margin_detail">
            <div id="collapseOne" class="row collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="col-lg-12 list_menu">
                <?php $no = 1 ?>
                    @foreach($data as $d)
                    <section id="section-1">
                        <h4>{{ $d->no_invoice }} - {{ date('d F Y' ,strtotime($d->tgl_penjualan)) }}</h4>
                        <h4>
                            <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-sm btn-outline-secondary"><?= $d->status_transaksi ?></button>
                            @if($d->no_resi != 0)
                            <button type="button" class="btn btn-outline-success btn-sm">Terima Barang</button>
                            @endif
                            <a class="btn btn-info btn-sm" data-toggle="collapse" href="#penjualan{{ $d->id_penjualan }}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Detail</a>
                            </div>
                        </h4>
                        <div class="table_wrapper collapse multi-collapse <?= $no++ == 1 ? 'show' : '' ?>" id="penjualan{{ $d->id_penjualan }}">
                            <table class="table cart-list menu-gallery">
                                <thead>
                                    <tr>
                                        <th>
                                            Item
                                        </th>
                                        <th>
                                            Price
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i =1; ?>
                                    @foreach(json_decode($d->detail_barang) as $k)
                                    <tr>
                                        <td class="d-md-flex align-items-center">
                                            <figure>
                                                <a href="{{ asset('upload/img_barang/'.$k->gambar_sampul) }}"
                                                    title="Photo title" data-effect="mfp-zoom-in"><img
                                                        src="{{ asset('upload/img_barang/'.$k->gambar_sampul) }}"
                                                        data-src="{{ asset('upload/img_barang/'.$k->gambar_sampul) }}"
                                                        alt="thumb" class="lazy"></a>
                                            </figure>
                                            <div class="flex-md-column">
                                                <h4>{{ $i++ }}. {{ $k->kategori }}</h4>
                                                <p>
                                                    {{$k->nama_barang}}
                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            <strong>{{ number_format($k->harga,0) }}</strong>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>
                    @endforeach
                    <!-- /section -->
                </div>
                <!-- /col -->

            </div>
            <div  id="collapseTwo" class="row collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="col-lg-12 list_menu">
                    <?php $no = 1; ?>
                    @foreach($dataPending as $d)
                    <section id="section-1">
                        <h4>{{ $d->no_invoice }} - {{ date('d F Y' ,strtotime($d->tgl_penjualan)) }}</h4>
                        <h4>
                            <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ $d->payment_url }}" target="_blank" class="btn btn-sm btn-warning">Lanjutkan Pembayaran</a>
                            <a href="{{ url('transaksi-v2/batal/'.$d->id_penjualan) }}" class="btn btn-sm btn-danger">Batalkan Transaksi</a> 
                            <a class="btn btn-info btn-sm" data-toggle="collapse" href="#penjualan{{ $d->id_penjualan }}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Detail</a>
                            </div>
                        </h4>
                        <div class="table_wrapper collapse multi-collapse <?= $no++ == 1 ? 'show' : '' ?>" id="penjualan{{ $d->id_penjualan }}">
                            <table class="table cart-list menu-gallery">
                                <thead>
                                    <tr>
                                        <th>
                                            Item
                                        </th>
                                        <th>
                                            Price
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i =1; ?>
                                    @foreach(json_decode($d->detail_barang) as $k)
                                    <tr>
                                        <td class="d-md-flex align-items-center">
                                            <figure>
                                                <a href="{{ asset('upload/img_barang/'.$k->gambar_sampul) }}"
                                                    title="Photo title" data-effect="mfp-zoom-in"><img
                                                        src="{{ asset('upload/img_barang/'.$k->gambar_sampul) }}"
                                                        data-src="{{ asset('upload/img_barang/'.$k->gambar_sampul) }}"
                                                        alt="thumb" class="lazy"></a>
                                            </figure>
                                            <div class="flex-md-column">
                                                <h4>{{ $i++ }}. {{ $k->kategori }}</h4>
                                                <p>
                                                    {{$k->nama_barang}}
                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            <strong>{{ number_format($k->harga,0) }}</strong>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>
                    @endforeach
                    <!-- /section -->
                </div>
                <!-- /col -->

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bg_gray -->
</main>
@endsection
