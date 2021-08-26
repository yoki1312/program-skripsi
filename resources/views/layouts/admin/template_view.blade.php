<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Planshop Id</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Google Font: Source Sans Pro -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    @if(cek_url() == 'http://')
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    @else
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    @endif
    <link rel="stylesheet"
        href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('frontEnd/css/font.awesome.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datepicker/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/dropzone/min/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- summernote -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.3/css/fileinput.min.css" media="all"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>
<div style="display:none">
    
    {{ session('status') }}
</div>
@if ($message = Session::get('success'))
<script>
    Swal.fire(
        'Berhasil!',
        '{{ $message }}',
        'success'
    );

</script>
@endif

@if ($message = Session::get('error'))
<script>
    Swal.fire(
        'Gagal!',
        '{{ $message }}',
        'error'
    );

</script>
@endif
@if(session('status') != '')
@if (session('status') == 'hapus')
<script>
    Swal.fire(
        'Berhasil!',
        'Data Berhasil Dihapus !!',
        'success'
    );

</script>
@elseif (session('status') == 'gagal')
<script>
    Swal.fire(
        'Data Gagal Tersimpan!',
        'Lengkapi semua form !!',
        'error'
    );

</script>
@else
<script>
    Swal.fire(
        'Data Berhasil Tersimpan!',
        'Data Selesai Disimpan !!',
        'success'
    );

</script>
@endif
@endif

<body class="hold-transition sidebar-mini layout-fixed" style="font-size:14px !important;" id="bdy">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <button type="button" class="btn btn-primary" data-toggle="dropdown">
                        <i class="fa fa-bell" aria-hidden="true"></i> <span class="badge badge-light" id="notif"></span>
                    </button>
                    <div id="pesan" class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#154007;">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('admin/dist/img/AdminLTELogo.jpeg') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-light">Plantshop.id</span>
            </a>
            <!-- Sidebar -->
            <br>
            <div class="sidebar">
                <!-- SidebarSearch Form -->
                <div class="form-inline">

                    <div style="font-color:black;" class="input-group" data-widget="sidebar-search">
                        <input style="color:black !important;background-color:whitesmoke !important;" autocomplete="off"
                            id="name" class="form-control form-control-sidebar" type="search" placeholder="Flter Menu"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>

                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ url('/test') }}" class="nav-link">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        @php $ck = App\Models\Modul::orderBy('no_urut','asc')->get(); @endphp
                        @foreach($ck as $res)
                        @php $md = App\Models\SubModul::where('id_modul', $res->id_modul)->get(); @endphp
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa <?= $res->icon ?>" aria-hidden="true"></i>
                                <p>
                                    {{ $res->modul }}
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            @foreach($md as $rmd)
                            @php $link = $rmd->link; @endphp
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= "/.$link" ?>" class="nav-link active">
                                        <i class="fa fa-dot-circle"></i>
                                        <p>{{ $rmd->SubModul}}</p>
                                    </a>
                                </li>
                            </ul>
                            @endforeach
                        </li>
                        @endforeach
                        <li class="nav-item">
                            <a href="{{ route('logoutAdmin') }}" class="nav-link">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                <p>Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            @section('konten')
            @show
        </div>

        <footer class="main-footer">
            <?php $currentAction = \Route::currentRouteAction();
            list($controller, $method) = explode('Controller@', $currentAction);
            $controller = preg_replace('/.*\\\/', '', $controller); ?>

            <strong>Copyright &copy; 2020 <a href="https://adminlte.io">Plantshop.id</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 0.1
            </div>
        </footer>


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script src="{{ asset('formplugins/bootstrap-fileinput/fileinput.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('admin/plugins/sparklines/sparkline.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('admin/plugins/datepicker/js/bootstrap-datepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('js/jquery.uploadPreview.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('inputmask/inputmask.bundle.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin/dist/js/demo.js') }}"></script>
    <script src="{{ asset('admin/dist/js/referensi.js') }}"></script>
    <!-- <script src="{{ asset('admin/js/referensi_bank_data.js') }}"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

    <script src="{{ asset('js/axios.js') }}"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="{{ asset('admin/dist/js/pages/dashboard.js') }}"></script> -->
    <!-- <script src="{{ asset('admin/js/Barang/create.js') }}"></script> -->
    <!-- <script src="{{ asset('/admin/js/<?=$controller.'/'.$method?>.js') }}"></script> -->


    <script src='/admin/js/<?=$controller.'/'.$method?>.js'></script>
    <script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        function notif(v) {
            if (v == 'sukses') {
                return Swal.fire(
                    'Berhasil!',
                    'Data Tersimpan!',
                    'success'
                )

            } else {
                return Swal.fire(
                    'Gagal Menambahkan Data!',
                    'Data Tidak Boleh Kosong!',
                    'error'
                )

            }
        }

    </script>
</body>

</html>
        