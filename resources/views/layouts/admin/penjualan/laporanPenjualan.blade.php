@extends('layouts.admin.template_view')
@section('konten')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Laporan Penjualan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
                    <li class="breadcrumb-item active">Laporan Penjualan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<style>
    .select2-container .select2-dropdown,
    .select2-container .select2-selection--multiple {
        max-width: 300px;
    }

</style>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <table id="ngoding" class="table table-sm table-bordered table-striped table-hover"
                            style="width:100%; ">
                            <thead>
                                <tr class="text-center">
                                    <th width="20px">No</th>
                                    <th>Nama Customer</th>
                                    <th>Kode Invoice</th>
                                    <th width="200px">Status</th>
                                    <th width="200px">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

@endsection
