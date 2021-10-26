@extends('v2.index')
@section('konten_area')
<main class="bg_gray" style="transform: none; margin-top:70px;">

    <div class="container margin_60_20">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-5">
                <div class="theiaStickySidebar"
                    style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 810px;">
                    <div class="box_order">
                        <div class="head">
                            <h3>Ringkasan Pesanan</h3>
                        </div>
                        <!-- /head -->
                        <div class="main">
                            <ul class="clearfix">
                                @foreach($data as $d)
                                <li><input data-harga="{{ $d->hargaJual }}" data-id="{{ $d->id_barang }}"
                                        class="detail-barang" data-berat="{{ $d->berat }}" type="checkbox" />
                                    -{{ $d->nama_barang }} ( {{ $d->berat }} Kg )<span>Rp.
                                        {{ number_format($d->hargaJual,0) }}</span></li>
                                @endforeach
                            </ul>
                            <!-- <a href="confirm.html" class="btn_1 gradient full-width mb_5">Order Now</a> -->
                            <!-- <div class="text-center"><small>Or Call Us at <strong>0432 48432854</strong></small></div> -->
                        </div>
                    </div>
                    <br>
                </div>
                <!-- /box_order_form -->
                <div class="box_order_form">
                    <div class="head">
                        <div class="title">
                            <h3>Metode Pembayaran</h3>
                        </div>
                    </div>
                    <!-- /head -->
                    <div class="main">
                        <div class="payment_select">
                            <label class="container_radio">Transfer Antar Bank
                                <input type="radio" data-tipe="1" id="tipe-pembayaran" value="Transfer Antar Bank" checked
                                    name="payment_method">
                                <span class="checkmark"></span>
                            </label>
                            <i class="icon_creditcard"></i>
                        </div>
                        <div class="payment_select">
                            <label class="container_radio">Transaksi Manual (WhatsApp)
                                <input data-tipe="2" type="radio" id="tipe-pembayaran" value="Transaksi Manual" name="payment_method">
                                <span class="checkmark"></span>
                            </label>
                            <i class="icon_wallet"></i>
                        </div>
                    </div>
                </div>

                <!-- /box_order_form -->
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="theiaStickySidebar"
                    style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 810px;">

                    <div class="box_order">
                        <div class="head">
                            <div class="title">
                                <h3>Biaya Pengiriman</h3>
                            </div>
                        </div>
                        <!-- /head -->
                        <div class="main">
                            <ul class="clearfix">
                                <li>Total Jumlah Barang<span id="jml-barang">0 Barang</span></li>
                                <input type="text" hidden class="berat-barang" />
                                <li>Total Berat Barang<span id="berat-barang">0 Kg</span></li>
                            </ul>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Kurir Expedisi</label>
                                    <select class="expedisi form-control" name="cari">
                                        <option value="">Pilih Expedisi</option>
                                        <option value="jne">Jne</option>
                                        <option value="pos">Pos Indonesia</option>
                                        <option value="tiki">Tiki</option>
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <label>Provinsi Tujuan</label>
                                    <select class="provinsi form-control" name="cari"></select>
                                </div>
                                <div class="col-sm-12">
                                    <label>Kota Tujuan</label>
                                    <select class="kabupaten form-control" name="cari"></select>
                                </div>
                                <div class="col-sm-12">
                                    <label>Detail Expedisi </label>
                                    <table class="table table-sm table-striped table-bordered " id="dt-expedisi">
                                        <thead>
                                            <tr class="text-center">
                                                <th></th>
                                                <th>Expedisi</th>
                                                <th>Harga</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <a class="btn_1 gradient full-width mb_5 order btn-bayar btn-tf">Bayar Sekarang</a>
                            <a style="display:none" target="_blank" href="https://wa.me/6285730982703?text=Konfirmasi%20pembelian%20{{ Auth::user()->name }}%20" class="btn_1 gradient full-width mb_5 btn-wa">Konfirmasi Whatsaap</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /col -->


        </div>
        <!-- /row -->
    </div>
    <!-- /container -->

</main>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $(document).on('change', '#tipe-pembayaran', function () {
            var tipe = this.value;
            $('#metode-pembayaran').text(tipe);
        });
        $(document).on('change', '.detail-barang', function () {
            var total = 0;
            var i = 0;
            $('input:checkbox:checked').each(function () {
                total += parseFloat($(this).attr('data-berat'));
                i++
            });
            $('#jml-barang').text(i + ' Barang')
            $('#berat-barang').text(total + ' Kg')
            $('.berat-barang').val(total)
        });
        $(document).on('click', '.btn-bayar', function () {
            let id_barang = [];
            var selected_ongkir = $('input[name="ongkos_kirim"]:checked');
            var total_harga = 0;
            var total_pembayaran = 0;
            $('input:checkbox:checked').each(function () {
                total_harga += parseFloat($(this).attr('data-harga'));
                id_barang.push({
                    id_barang: $(this).attr('data-id')
                })
            });
            total_harga = total_harga + parseFloat(selected_ongkir.val());
            Swal.fire({
                title: 'Lanjut Transaksi',
                text: "Total pembayaran Rp. " + format_rp(total_harga),
                icon: 'question',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonText: 'Bayar'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post('penjualan/storeShop', {
                        id_barang: id_barang,
                        harga_ongkir: selected_ongkir.val(),
                        expedisi: selected_ongkir.attr("data-expedisi"),
                        estimasi: selected_ongkir.attr("data-estimasi"),
                        layanan_expedisi: selected_ongkir.attr("data-layanan-expedisi"),
                        berat_barang: $('.berat-barang').val()
                    }).then((response) => {
                        var data = response.data;
                        console.log(response)
                        // window.open('https://wa.me/6285730982703?text=Konfirmasi%20pembelian%20no-transaksi%20"'+ response.data +'"');

                        window.open(data.payment_url)
                    }).catch((error) => {
                        console.log(error.response)
                    });
                }
            })
        });
        $(document).on('change','#tipe-pembayaran',function(){
            if($(this).attr('data-tipe') == 1){
                $('.btn-wa').hide();
                $('.btn-tf').show();
            }else{
                $('.btn-wa').show();
                $('.btn-tf').hide();
            }
        })
    })

</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.expedisi').select2({
            placeholder: "Pilih Expedisi",
            allowClear: true
        }).on('select2:select', function (e) {
            var id_kota = $('.kabupaten').val();
            if (id_kota != null) {
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
                        <input value=` + value.cost[0].value + ` type="radio" data-expedisi ="` + response[0].code
                            .toUpperCase() + `" data-layanan-expedisi="` + value.service +
                            `" data-estimasi="` + value.cost[0].etd + `" name="ongkos_kirim" id="exampleRadios1"  >
                        </div>
                    </td>
                    <td class="text-center"><strong>` + value.service + ' - ' + value.cost[0].etd + `</strong></td>
                    <td class="text-right">` + format_rp(value.cost[0].value) + `</td>
                </tr>`)
                    });

                }
            }
        });

    }

</script>

@endsection
