<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    #customers {
        font-size : 12px;
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 4px;
    }

    #customers tr:nth-child(even) {
        background-color: #fbe2a1;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        text-align: center;
        background-color: #d97031;
        color: white;
    }

</style>

<body>
    @foreach($penjualan as $p)
    <table width="100%">
        <tr>
            <th style="text-align:left;"><img src="http://localhost:8000/produk/logo.jpg" alt="BTS" style="width:120px;">
            </th>
            <th></th>
            <th style="text-align:right;font-size:10px;"> <img src="http://34.87.101.35/produk/sampul/<?= $p->qr ?>" alt="BTS" style="width:80px;"></th>
        </tr>
    </table>
    <table width="100%" style="margin-top:-20px">
        <tr>
            <th style="text-align:left; font-size:14px;">Perum Semen Gresik Blok G246<br>Segunting Awikoen<br>HP/WA
                085604416860<br>ID @plantshop.id</th>
            <th style="text-align:right;vertical-align: text-top; font-size:14px;">Date<br> Invoice #</th>
            <th width="150px;" style="text-align:right;vertical-align: text-top; font-size:14px;">
                {{ date('d-m-Y', strtotime($p->tgl_penjualan)) }}<br>{{ $p->no_invoice }}</th>
        </tr>
    </table>
    <hr>
    <br>
    <table width="100%">
        <tr>
            <th style="text-align:left;background:#d97031; font-size:14px;color:white;"> Bill To</th>

        </tr>
    </table>
    
    <table width="100%" style="margin-top:15px; margin-bottom:15px;">
        <tr>
            <th style="text-align:left; font-size:14px;">{{ $p->nama_users }}</th>

        </tr>
    </table>
    <table id="customers" class="table table-sm table-bordered table-striped table-hover" width="100%">
        <thead>
            <tr class="bg-info text-center">
                <th width="300px">Nama Barang</th>
                <th width="300px">Harga</th>
                <th width="0px">Diskon</th>
            </tr>
        </thead>
        <tbody id="itemlist">
            @foreach($detailPenjualan as $res)
            <tr>
                <td style="text-align:center !important;">{{ $res->nama_barang }}</td>
                <td style="text-align:right !important;">{{ number_format($res->hargaJual,2) }}</td>
                <td style="text-align:right !important;">{{ $res->diskon }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td style="text-align:center !important;">Total</td>
                <td style="text-align:right !important;"><input readonly style="border:none;text-align:right !important;" value="{{ number_format($p->total,2) }}">
                </td>
                <td></td>
            </tr>
        </tfoot>
    </table>
    @endforeach
</body>

</html>
