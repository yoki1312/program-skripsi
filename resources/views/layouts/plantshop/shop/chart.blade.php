@extends('layouts.plantshop.template_view')
@section('konten')

<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>Keranjang</h3>
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li>Keranjang</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="Checkout_section  mt-100" id="accordion">
    <div class="container">
        <div class="checkout_form">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <form action="/penjualan/storeShop" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <h3>Pesanan Anda</h3>
                        <div class="table-responsive-md">
                            <table class="table table-sm table-striped table-bordered " id="dt">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Diskon</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>

                            </table>
                        </div>
                        <div class="payment_method">
                            <div class="">
                                <button class="assas btn btn-sm btn-info" type="button">Lanjut Transaksi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-po" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="text-center" id="exampleModalLabel">Plantshop.id</h5>
            </div>
            <div class="modal-body text-center">
                <h3> Pembayaran</h3>
                <hr>
                <table style="width:100%" id="pe-order" class="table table-sm table-striped table-bordered ">
                    <thead>
                        <tr>
                            <th>Barang</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <th>Total</th>
                        <th class="text-right"><input readonly class="total-po text-right" type="text"
                                style="border:none" /></th>
                    </tfoot>
                </table>
                <h5 id="ket-po"> </h5>
                <hr>
                <h5>Pilih Metode Pembayaran</h5>
                <h4><input type="checkbox" checked /> &nbsp;<i class="fa fa-whatsapp" aria-hidden="true"></i>
                    08113336722 ( Konfirmasi kepada penjual )</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary btn-sm btn-bayar">Bayar</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    var data;
    $(document).ready(function () {
        let table = $('#dt').DataTable({
            "searching": true,
            "autoWidth": true,
            "responsive": true,
            "processing": true,
            "serverSide": false,
            "paginate": true,
            "lengthChange": true,
            "filter": true,
            "bInfo": false,
            ajax: 'datapreorder',
            columns: [{
                    data: 'nama_barang',
                    class: 'text-left'
                },
                {
                    data: 'hargaJual',
                    class: 'text-center',
                    render: function (data, meta, row) {
                        return convertToRupiah(data);
                    },
                },
                {
                    data: 'diskon',
                    class: 'text-center',
                    render: function (data, meta, row) {
                        return convertToRupiah(data);
                    },
                },
                {
                    data: null,
                    class: 'text-center',
                    render: function (data, meta, row) {
                        return convertToRupiah(row.hargaJual - row.diskon);
                    }
                },
                {
                    data: 'action',
                    class: 'text-center',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            "drawCallback": function (settings) {

            }
        });
        $('#dt tbody').on('click', 'tr', function () {
            $(this).toggleClass('selected');
        });
        $(document).on('click', '.assas', function () {
            $('#pe-order').find('tbody').empty();
            data = table.rows('.selected').data();
            var i;
            var total = 0;
            var grandTotal = 0;
            if (data.length != 0) {
                $('#modal-po').modal('show');
                for (i = 0; i < data.length; i++) {
                    var pro = data[i];
                    if (pro == null) {
                        console.log('telek');
                    }
                    total = pro['hargaJual'] - pro['diskon'];
                    grandTotal += total;
                    $('#pe-order').find('tbody').append('<tr><td>' + pro['nama_barang'] +
                        '</td><td class="text-right">' + convertToRupiah(total) + '</td></tr>');
                    console.log(pro['nama_barang']);
                }
            } else {
                Swal.fire(
                    'Anda belum memilih barang',
                    'Silahkan pilih barang untuk melanjutkan pembayaran',
                    'info'
                )
            }
            $('.total-po').val(convertToRupiah(grandTotal));
            $('#ket-po').text('Total Yang Harus Dibayar : ' + convertToRupiah(grandTotal));
        });
        $(document).on('click', '.btn-bayar', function () {
            console.log(data);
            let id_barang = [];
            for (i = 0; i < data.length; i++) {
                id_barang.push({
                    id_barang: data[i]['id_barang']
                })
            }
            console.log(id_barang)
            axios.post('penjualan/storeShop', {
                id_barang: id_barang
            }).then((response) => {
                // window.open('https://wa.me/6285730982703?text=Konfirmasi%20pembelian%20no-transaksi%20"'+ response.data +'"');

                $('#modal-po').modal('hide');
                window.location.href = "{{ url('pembelian/bayar/')}}" + '/' + response.data;
            }).catch((error) => {
                console.log(error.response)
            });
        })
    });

    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }

</script>

@endsection
