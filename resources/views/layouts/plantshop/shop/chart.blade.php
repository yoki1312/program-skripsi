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
                                        <th>Berat</th>
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
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card" style="width: 100%;">
                                            <div class="card-header">
                                                Ongkos Kirim
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label>Kurir Expedisi</label>
                                                        <select class="expedisi form-control" name="cari">
                                                            <option value="">Pilih Expedisi</option>
                                                            <option value="jne">Jne</option>
                                                            <option value="pos">Pos Indonesia</option>
                                                            <option value="tiki">Tiki</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>Provinsi Tujuan</label>
                                                        <select class="provinsi form-control" name="cari"></select>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>Kota Tujuan</label>
                                                        <select class="kabupaten form-control" name="cari"></select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label>Kota Pengiriman </label>
                                                        <input value="Gresik" type="text"
                                                            class="form-control form-control-sm text-center" readonly />
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>Jumlah Barang </label>
                                                        <input value="0" type="text"
                                                            class="form-control form-control-sm text-right jumlah-barang"
                                                            readonly />
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>Berat Barang </label>
                                                        <input value="0" type="text"
                                                            class="form-control form-control-sm text-right berat-barang"
                                                            readonly />
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <label>Detail Expedisi </label>
                                                        <table class="table table-sm table-striped table-bordered "
                                                            id="dt-expedisi">
                                                            <thead>
                                                                <tr class="text-center">
                                                                    <th>Pilih Expedisi</th>
                                                                    <th>Expedisi</th>
                                                                    <th>Tipe Layanan</th>
                                                                    <th>Estimasi Kedatangan</th>
                                                                    <th>Harga</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>

                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
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
<script type="text/javascript">
    $(document).ready(function () {
        $('.expedisi').select2({
            placeholder: "Pilih Expedisi",
            allowClear: true
        }).on('select2:select', function (e) {
            var id_kota = $('.kabupaten').val();
            if(id_kota != null){
                getOngkosKirim();
            }
        });
        $('.provinsi').select2({
            placeholder: 'Cari Provinsi...',
            ajax: {
                url: 'ongkir/provinsi',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.province,
                                id: item.province_id
                            }
                        })
                    };
                },
                cache: true
            }
        });
        $('.kabupaten').select2({
            placeholder: 'Cari Kota...',
            ajax: {
                url: 'ongkir/kota',
                dataType: 'json',
                data: function (params) {
                    params.id_provinsi = $('.provinsi').val()
                    return params;
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.city_name + '-' + item.postal_code,
                                id: item.city_id
                            }
                        })
                    };
                },
                cache: true
            }
        }).on('select2:select', function (e) {
            getOngkosKirim();
        });;

    })

</script>
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
                    data: 'berat',
                    class: 'text-center'
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
            var items = table.rows('.selected').data();
            var total_berat = 0;
            var jumlah_barang = 0;
            for (i = 0; i < items.length; i++) {
                var berat = items[i]['berat'];
                total_berat += parseFloat(berat);
                jumlah_barang++
            }
            $('.berat-barang').val(total_berat);
            $('.jumlah-barang').val(jumlah_barang);
        });
        $(document).on('click', '.assas', function () {
            $('#pe-order').find('tbody').empty();
            data = table.rows('.selected').data();
            var i;
            var total = 0;
            var grandTotal = 0;
            var ongkos_kirim = $('input[name="ongkos_kirim"]:checked').val();
            if (data.length != 0) {
                $('#modal-po').modal('show');
                for (i = 0; i < data.length; i++) {
                    var pro = data[i];
                    if (pro == null) {
                        console.log('telek');
                    }
                    total = pro['hargaJual'] - pro['diskon'];
                    grandTotal += total;
                    $('#pe-order').find('tbody').append('<tr><td>' + pro['nama_barang'] +'</td><td class="text-right">' + convertToRupiah(total) + '</td></tr>');
                }
                $('#pe-order').find('tbody').append('<tr><td>Biaya Kirim</td><td class="text-right">' + convertToRupiah(ongkos_kirim) + '</td></tr>');
            } else {
                Swal.fire(
                    'Anda belum memilih barang',
                    'Silahkan pilih barang untuk melanjutkan pembayaran',
                    'info'
                )
            }
            $('.total-po').val(convertToRupiah(parseFloat(grandTotal) + parseFloat(ongkos_kirim)));
            $('#ket-po').text('Total Yang Harus Dibayar : ' + convertToRupiah(parseFloat(grandTotal) + parseFloat(ongkos_kirim)));
        });
        $(document).on('click', '.btn-bayar', function () {
            let id_barang = [];
            var selected_ongkir = $('input[name="ongkos_kirim"]:checked');
            for (i = 0; i < data.length; i++) {
                id_barang.push({
                    id_barang: data[i]['id_barang']
                })
            }
            axios.post('penjualan/storeShop', {
                id_barang: id_barang,
                harga_ongkir : selected_ongkir.val(),
                expedisi: selected_ongkir.attr("data-expedisi"),
                estimasi: selected_ongkir.attr("data-estimasi"),
                layanan_expedisi : selected_ongkir.attr("data-layanan-expedisi"),
                berat_barang : $('.berat-barang').val()
            }).then((response) => {
                // window.open('https://wa.me/6285730982703?text=Konfirmasi%20pembelian%20no-transaksi%20"'+ response.data +'"');

                $('#modal-po').modal('hide');
                window.location.href = "{{ url('pembelian/bayar/')}}" + '/' + response.data;
            }).catch((error) => {
                console.log(error.response)
            });
        });
        $(document).on('click', '.remove-order', function () {
            var data = table.row($(this).parents('tr')).data();
            console.log(data);
            axios.post('/deleted-to-cart/' + data.id_pre_order).then((response) => {
                table.ajax.reload(null, false);
            }).catch((error) => {
                console.log(error.response.data)
            });
        });
    });

    function getOngkosKirim() {

        let token = $("meta[name='csrf-token']").attr("content");
        var kabupaten_id = $('.kabupaten').val();
        var berat_barang = $('.berat-barang').val();
        var expedisi = $('.expedisi').val();
        var parrentTable = $('#dt-expedisi').find('tbody');
        parrentTable.empty();
        $.ajax({
            url: "ongkir/harga",
            data: {
                _token: token,
                origin: "133",
                city_destination: kabupaten_id,
                weight: berat_barang,
                courier: expedisi,
            },
            dataType: "JSON",
            type: "POST",
            success: function (response) {
                isProcessing = false;
                if (response) {
                    $.each(response[0]['costs'], function (key, value) {
                        parrentTable.append(`
                        <tr>
                            <td><div class="form-check">
                                <input value=` + value.cost[0].value + ` type="radio" data-expedisi ="`+response[0].code.toUpperCase()+`" data-layanan-expedisi="`+value.service+`" data-estimasi="`+value.cost[0].etd +`" name="ongkos_kirim" id="exampleRadios1"  >
                                </div>
                            </td>
                            <td class="text-left">` + response[0].code.toUpperCase() + `</td>
                            <td class="text-center"><strong>` + value.service + `</strong></td>
                            <td class="text-center">` + value.cost[0].etd + ` </td>
                            <td class="text-right">` + convertToRupiah(value.cost[0].value) + `</td>
                        </tr>`)
                    });

                }
            }
        });

    }

    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }

</script>

@endsection
