<!DOCTYPE html>
<html lang="en">

<head>
    <title>Konfirmasi Pembayaran</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('templatekonfirmasi/images/icons/favicon.ico') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('templatekonfirmasi/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('templatekonfirmasi/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('templatekonfirmasi/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('templatekonfirmasi/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('templatekonfirmasi/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('templatekonfirmasi/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('templatekonfirmasi/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('templatekonfirmasi/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('templatekonfirmasi/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('templatekonfirmasi/css/main.css') }}">
    <!--===============================================================================================-->
</head>

<body>


    <div class="container-login100" style="background-image: url({{ asset('templatekonfirmasi/images/bg-01.jpg') }});">
            <div class="card" style="width:50%;">
                <h5 class="card-header">CheckOut {{ $data->no_invoice }}</h5>
                <div class="card-body">
                   <table class="table table-sm table-bordered" style="width:100%">
                       <thead class="table-info">
                           <tr >
                               <th class="text-center">Item</th>
                               <th class="text-center">Harga</th>
                               <th class="text-center">Diskon</th>
                               <th class="text-center">Total</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php $total=0; ?>
                       @foreach($pes as $t)
                           <tr>
                               <td class="text-left">{{ $t->nama_barang }}</td>
                               <td class="text-right">{{ number_format($t->hargaJual,2) }}</td>
                               <td class="text-right">{{ number_format($t->diskon,2) }}</td>
                               <td class="text-right">{{ number_format($t->hargaJual - $t->diskon,2) }}</td>
                               <?php $total += $t->hargaJual - $t->diskon  ?>
                           </tr>
                        @endforeach
                       </tbody>
                       <tfoter>
                           <tr>
                               <th colspan="3">Total</th>
                               <th class="text-right">Rp {{ number_format($total,2) }}</th>
                           </tr>
                       </tfoter>
                   </table>
                </div>
                <div class="card-footer">
                <button class="btn btn-sm btn-success"><a style="color:white;" href="https://wa.me/6285730982703?text=Konfirmasi%20pembelian%20no-transaksi%20{{ $data->no_invoice }}"><i class="fa fa-whatsapp" aria-hidden="true"></i> Hubungi Penjual Untuk Melanjutkan Transaksi</a></button>
                &nbsp; <a type="submit" href="{{ url('/batal/transaksi/'.$data->id_penjualan) }}" class="btn btn-sm btn-danger"> Batal Transaksi</a>
                <!-- &nbsp; <a type="submit" href="{{ url('/') }}" class="btn btn-sm btn-danger"> Kembali</a> -->
            </div>
            </div>
    </div>



    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="{{ asset('templatekonfirmasi/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('templatekonfirmasi/vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('templatekonfirmasi/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('templatekonfirmasi/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('templatekonfirmasi/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('templatekonfirmasi/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('templatekonfirmasi/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('templatekonfirmasi/vendor/countdowntime/countdowntime.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('templatekonfirmasi/js/main.js') }}"></script>

</body>

</html>
