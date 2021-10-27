<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="FooYes - Quality delivery or takeaway food">
    <meta name="author" content="Ansonika">
    <title>Plantshop.id</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{!! asset('v2/img/favicon.ico') !!}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon"
        href="{!! asset('v2/img/apple-touch-icon-57x57-precomposed.png') !!}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
        href="{!! asset('v2/img/apple-touch-icon-72x72-precomposed.png') !!}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
        href="{!! asset('v2/img/apple-touch-icon-114x114-precomposed.png') !!}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(isset(Auth::user()->id))
    <meta name="auth" content="{{ Auth::user()->id }}">
    @endif
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
        href="{!! asset('v2/img/apple-touch-icon-144x144-precomposed.png') !!}">
    <!-- GOOGLE WEB FONT -->
    <link rel="stylesheet" href="{{ asset('frontEnd/css/bootstrap.min.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script type="text/javascript">
        ! function (e, n, t) {
            "use strict";
            var o = "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap",
                r = "__3perf_googleFonts_c2536";

            function c(e) {
                (n.head || n.body).appendChild(e)
            }

            function a() {
                var e = n.createElement("link");
                e.href = o, e.rel = "stylesheet", c(e)
            }

            function f(e) {
                if (!n.getElementById(r)) {
                    var t = n.createElement("style");
                    t.id = r, c(t)
                }
                n.getElementById(r).innerHTML = e
            }
            e.FontFace && e.FontFace.prototype.hasOwnProperty("display") ? (t[r] && f(t[r]), fetch(o).then(function (
                e) {
                return e.text()
            }).then(function (e) {
                return e.replace(/@font-face {/g, "@font-face{font-display:swap;")
            }).then(function (e) {
                return t[r] = e
            }).then(f).catch(a)) : a()
        }(window, document, localStorage);

    </script>

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript">
        ! function (e, n, t) {
            "use strict";
            var o = "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap",
                r = "__3perf_googleFonts_c2536";

            function c(e) {
                (n.head || n.body).appendChild(e)
            }

            function a() {
                var e = n.createElement("link");
                e.href = o, e.rel = "stylesheet", c(e)
            }

            function f(e) {
                if (!n.getElementById(r)) {
                    var t = n.createElement("style");
                    t.id = r, c(t)
                }
                n.getElementById(r).innerHTML = e
            }
            e.FontFace && e.FontFace.prototype.hasOwnProperty("display") ? (t[r] && f(t[r]), fetch(o).then(function (
                e) {
                return e.text()
            }).then(function (e) {
                return e.replace(/@font-face {/g, "@font-face{font-display:swap;")
            }).then(function (e) {
                return t[r] = e
            }).then(f).catch(a)) : a()
        }(window, document, localStorage);

    </script>

    <!-- BASE CSS -->
    <link href="{!! asset('v2/css/bootstrap_customized.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('v2/css/style.css') !!}" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="{!! asset('v2/css/home.css') !!}" rel="stylesheet">
    <link href="{!! asset('v2/css/listing.css') !!}" rel="stylesheet">

    <link href="{!! asset('v2/css/order-sign_up.css') !!}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link href="{!! asset('v2/css/submit.css') !!}" rel="stylesheet">
    <link href="{!! asset('v2/css/blog.css') !!}" rel="stylesheet">
    <link href="{!! asset('v2/css/contacts.css') !!}" rel="stylesheet">
</head>

<body>

    <header class="header black_nav clearfix element_to_stick">
        <div class="container">
            <div id="logo">
                <a href="{{ url('index') }}">
                    <img src="{!! asset('v2/img/logo.png')!!}" width="162" height="35" alt="">
                </a>
            </div>
            @if(isset(Auth::user()->id))
            <ul id="top_menu" class="drop_user">
                <li>
                    <div class="dropdown user clearfix">
                        <a href="#" data-toggle="dropdown">
                            @if(Auth::user()->foto_profile == null)
                            <figure><img src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png"
                                    alt=""></figure>
                            @else
                            <figure><img src="{{ asset('upload/foto_profile/'.Auth::user()->foto_profile) }}" alt="">
                            </figure>
                            @endif

                            <span>{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-content">
                                <ul>
                                    <li><a href="{{ url('transaksi-v2') }}"><i class="fa fa-exchange"
                                                aria-hidden="true"></i>Transaksi</a></li>
                                    <li><a href="{{ url('profile-v2') }}"><i class="icon_cog"></i>Profile</a></li>
                                    <li><a class="logout"><i class="icon_key"></i>Log out</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /dropdown -->
                </li>
            </ul>
            @endif
            <div class="layer"></div><!-- Opacity Mask Menu Mobile -->
            <ul id="top_menu" style="margin-top: 10px;">
                @if(!isset(Auth::user()->id))
                <li><a href="#sign-in-dialog" id="sign-in"><i style="font-size: 20px" class="fa fa-sign-in"
                            aria-hidden="true"></i></a></li>
                @endif
                <li>
                    <div class="dropdown dropdown-cart">
                        <a class="keranjang"><i style="font-size: 20px"
                                class="fa fa-shopping-cart content-total-belanja" aria-hidden="true"></i></a>
                        <div class="dropdown-menu card-div">
                            <ul class="list-order">

                            </ul>
                            <div class="total_drop">
                                <div class="clearfix add_bottom_15"><strong>Total</strong><span id="total-order">Rp.
                                        0</span></div>
                                <a href="{{ url('order') }}" class="btn_1 outline">View Cart</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- /top_menu -->
            <a href="#0" class="open_close">
                <i class="icon_menu"></i><span>Menu</span>
            </a>
            <nav class="main-menu">
                <div id="header_menu">
                    <a href="#0" class="open_close">
                        <i class="icon_close"></i><span>Menu</span>
                    </a>
                    <a href="index.html"><img src="{!! asset('v2/img/logo.svg') !!}" width="162" height="35" alt=""></a>
                </div>
                <ul>
                    <li class="submenu">
                        <a href="{{ url('index') }}" class="show-submenu">Dashboard</a>
                    </li>
                    <li class="submenu">
                        <a href="{{ url('produk-v2') }}" class="show-submenu">Produk</a>
                    </li>
                    <li class="submenu">
                        <a href="#0" class="show-submenu">Referensi</a>
                        <ul>
                            <li><a href="{{ url('artikel-v2') }}">Artikel</a></li>
                            <li><a href="{{ url('bank-data-v2') }}">Bank Tanaman</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="{{ url('about-v2') }}" class="show-submenu">Kontak Kami</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- /header -->

    @section('konten_area')
    @show

    <!-- /main -->
    <style>
        #message {
            position: fixed;
            bottom: 15px;
            left: 15px;
            background-color: #e54750;
            color: #fff;
            padding: 12px 12px 10px 40px;
            font-weight: 500;
            line-height: 1;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -ms-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0px 0px 15px 0px rgb(0 0 0 / 30%);
            -moz-box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 0px 15px 0px rgb(0 0 0 / 30%);
            z-index: 10000;
            display: none;
        }

    </style>
    <div id="message">Barang ditambahkan ke keranjang</div>
    <footer>
        <div class="wave footer"></div>
        <div class="container margin_60_40 fix_mobile">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <h3 data-target="#collapse_2">Categories</h3>
                    <div class="collapse dont-collapse-sm links" id="collapse_2">
                        <ul>
                            @foreach(Kategori() as $t)
                            <li><a href="grid-listing-filterscol-full-masonry.html">{{ $t->nama_kategori }}</a></li>

                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 data-target="#collapse_3">Kontak Kami</h3>
                    <div class="collapse dont-collapse-sm contacts" id="collapse_3">
                        <ul>
                            <li><i class="icon_house_alt"></i>{{ toko()->alamat }}</li>
                            <li><i class="icon_mobile"></i>{{ toko()->kontak }}</li>
                            <li><i class="icon_mail_alt"></i><a href="#0">{{ toko()->email }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h3 data-target="#collapse_4">Saran dan Masukan</h3>
                    <div class="collapse dont-collapse-sm" id="collapse_4">
                        <div id="newsletter">
                            <div id="message-newsletter"></div>
                            <form method="post" action="assets/newsletter.php" name="newsletter_form"
                                id="newsletter_form">
                                <div class="form-group">
                                    <input type="email" name="email_newsletter" id="email_newsletter"
                                        class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <textarea cols="3" class="form-control">Saran dan Masukan</textarea>
                                </div>
                                <button class="btn btn-info btn-sm">Kirim</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /row-->
        </div>
        </div>
    </footer>
    <!--/footer-->

    <div id="toTop"></div><!-- Back to top button -->

    <!-- Sign In Modal -->
    <div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
        <div class="modal_header">
            <h3>Sign In</h3>
        </div>
            <div class="sign-in-wrapper">
                <a href="{{ url('auth/google') }}" class="social_bt google">Login with Google</a>
                <div class="divider"><span>Or</span></div>
                <form method="POST" action="{{ url('loginPembeli') }}">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                        <i class="icon_mail_alt"></i>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="password" value="">
                        <i class="icon_lock_alt"></i>
                    </div>
                    <div class="clearfix add_bottom_15">
                        <div class="checkboxes float-left">
                            <label class="container_check">Remember me
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="float-right"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Log In" class="btn_1 full-width mb_5">
                        Don’t have an account? <a href="register.html">Sign up</a>
                    </div>
                    <div id="forgot_pw">
                        <div class="form-group">
                            <label>Please confirm login email below</label>
                            <input type="email" class="form-control" name="email_forgot" id="email_forgot">
                            <i class="icon_mail_alt"></i>
                        </div>
                        <p>You will receive an email containing a link allowing you to reset your password to a new
                            preferred one.</p>
                        <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
                    </div>
                </form>
            </div>
        <!--form -->
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

    @if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('info'))
    <div class="alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Please check the form below for errors
    </div>
    @endif
    <!-- /Sign In Modal -->

    <!-- COMMON SCRIPTS -->
    <script src="{!! asset('v2/js/common_scripts.min.js') !!}"></script>
    <script src="{!! asset('v2/js/common_func.js') !!}"></script>
    <script src="{!! asset('v2/js/sticky_sidebar.min.js') !!}"></script>
    <script src="{!! asset('v2/js/specific_listing.js') !!}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script>
        function initMap() {
            var input = document.getElementById('autocomplete');
            var autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.addListener('place_changed', function () {
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    window.alert("Autocomplete's returned place contains no geometry");
                    return;
                }

                var address = '';
                if (place.address_components) {
                    address = [
                        (place.address_components[0] && place.address_components[0].short_name || ''),
                        (place.address_components[1] && place.address_components[1].short_name || ''),
                        (place.address_components[2] && place.address_components[2].short_name || '')
                    ].join(' ');
                }
            });
        }

        function format_rp(v) {
            var bilangan = v;

            var number_string = bilangan.toString(),
                sisa = number_string.length % 3,
                rupiah = number_string.substr(0, sisa),
                ribuan = number_string.substr(sisa).match(/\d{3}/g);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            return rupiah;
        }

    </script>
    <script>
        var auth = $('meta[name="auth"]').attr('content');
        console.log(auth);
        if (auth != null) {
            $(document).on('click', '.keranjang', function () {
                var checkClass = $('.card-div').hasClass("show");
                if (checkClass == false) {
                    $('.card-div').addClass('show');
                    getPreOrder();
                } else {
                    $('.card-div').removeClass('show');
                    getPreOrder();
                }
            })
            getPreOrder();

            function getPreOrder() {
                $.ajax({
                    type: "POST",
                    url: '{{ url('getDataPreorder ') }}',
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        var i = 0;
                        $('.list-order').empty();
                        if (response.length != 0) {
                            $('.list-order').attr('style', 'height: 200px; overflow: auto');
                        } else {
                            $('.list-order').removeAttr('style');

                        }
                        var rp_order = 0;
                        for (i = 0; i < response.length; i++) {
                            var data = response[i];
                            rp_order += data['hargaJual'];
                            $('.list-order').append(`<li>
                                    <figure><img src="/upload/img_barang/` + data['gambar_sampul'] + `" data-src="img/menu-thumb-1.jpg"
                                            alt="" width="50" height="50" class="lazy"></figure>
                                    <strong><span>` + data['nama_barang'] + `</span>Rp. ` + format_rp(data[
                                'hargaJual']) + `</strong>
                                    <a class="remove-order action" data-id="` + data['id_pre_order'] + `"><i class="icon_trash_alt"></i></a>
                                </li>`);
                        }
                        $('#total-order').text('Rp. ' + format_rp(rp_order))
                        $('.content-total-belanja').empty().append('<span class="total-belanja">' + i +
                            '</span>');
                    }
                });
            }
        }
        $(document).on('click', '.remove-order', function () {
            var id = $(this).attr('data-id');
            axios.post('/deleted-to-cart/' + id).then((response) => {
                getPreOrder();
            }).catch((error) => {
                console.log(error.response.data)
            });
        });
        $(".logout").click(function () {
            axios.post('/logout')
                .then(() => location.href = '/index')
        });

    </script>
    <script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
    @yield('js')
</body>

</html>
