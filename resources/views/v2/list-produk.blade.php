@foreach($produk as $r)
<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
    <div class="strip">
        <figure>
            <span class="ribbon "><button style="margin-top:-7px;" class="btn btn-xs btn-warning add-to-cart"
                    produk-id="<?= $r->id_barang ?>" type="button"><i class="fa fa-shopping-cart"
                        aria-hidden="true"></i></button></span>
            <img src="{{ asset('upload/img_barang/'.$r->gambar_sampul) }}"
                data-src="{{ asset('upload/img_barang/'.$r->gambar_sampul) }}" class="img-fluid lazy loaded" alt=""
                data-was-processed="true">
            <a href="{{ url('produk-v2/detail/'.$r->id_barang) }}" class="strip_info" target="_top">
                <small>{{ $r->nama_kategori }} </small>
                <div class="item_title">
                    <h3>{{ $r->nama_barang }}</h3>
                    <small></small>
                </div>
            </a>
        </figure>
        <ul>
            <li> <b><i class="fa fa-money" aria-hidden="true"></i>
                    {{ number_format($r->hargaJual,0) }}</b> </li>
            <li>
                <div class="score"><strong>Ready Stock</strong></div>
            </li>
        </ul>
    </div>
</div>
@endforeach
<div class="col-sm-12">
    <ul> {{ $produk->links('pagination::bootstrap-4') }}</ul>
</div>
