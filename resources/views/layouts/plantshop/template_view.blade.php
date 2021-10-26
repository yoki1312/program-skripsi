<!doctype html>
<html lang="en">


<!-- Mirrored from demo.hasthemes.com/lukani-preview-v1/lukani/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Dec 2020 11:41:48 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Plantshop.id</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontEnd/img/favicon.ico') }}">

    <!-- CSS 
    ========================= -->
    <!--bootstrap min css-->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="{{ asset('frontEnd/css/bootstrap.min.css') }}">
    <!--owl carousel min css-->
    <link rel="stylesheet" href="{{ asset('frontEnd/css/owl.carousel.min.css') }}">
    <!--slick min css-->
    <link rel="stylesheet" href="{{ asset('frontEnd/css/slick.css') }}">
    <!--magnific popup min css-->
    <link rel="stylesheet" href="{{ asset('frontEnd/css/magnific-popup.css') }}">
    <!--font awesome css-->
    @if(cek_url() == 'http://')
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    @else
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    @endif
    <!-- <link rel="stylesheet" href="{{ asset('frontEnd/css/font.awesome.css') }}"> -->
    <!--animate css-->
    <link rel="stylesheet" href="{{ asset('frontEnd/css/animate.css') }}">
    <!--jquery ui min css-->
    <link rel="stylesheet" href="{{ asset('frontEnd/css/jquery-ui.min.css') }}">
    <!--slinky menu css-->
    <link rel="stylesheet" href="{{ asset('frontEnd/css/slinky.menu.css') }}">
    <!--plugins css-->
    <link rel="stylesheet" href="{{ asset('frontEnd/css/plugins.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}" />
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontEnd/css/style.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--modernizr min js here-->
    <script src="{{ asset('frontEnd/js/vendor/modernizr-3.7.1.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

</head>

<body>
    <!--header area start-->

    <!--offcanvas menu area start-->
    <div class="off_canvars_overlay">

    </div>
    <div class="offcanvas_menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open">
                        <a href="javascript:void(0)"><i class="icon-menu"></i></a>
                    </div>
                    <!-- <div class="offcanvas_menu_wrapper">
                        <div class="canvas_close">
                            <a href="javascript:void(0)"><i class="icon-x"></i></a>
                        </div>
                        <div class="welcome-text">
                            <p>Free Delivery: Take advantage of our time to save event</p>
                        </div>
                        <div class="language_currency text-center">
                            <ul>
                                <li class="currency"><a href="#"> USD <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_currency">
                                        <li><a href="#">EUR</a></li>
                                        <li><a href="#">GPB</a></li>
                                        <li><a href="#">RUP</a></li>
                                    </ul>
                                </li>
                                <li class="language"><a href="#"> English <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_language">
                                        <li><a href="#">French</a></li>
                                        <li><a href="#">Spanish</a></li>
                                        <li><a href="#">Russian</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="search_container">
                            <form action="#">
                                <div class="hover_category">
                                    <select class="select_option" name="select" id="categori2">
                                        <option selected value="1">All Categories</option>
                                        <option value="2">Accessories</option>
                                        <option value="3">Accessories & More</option>
                                        <option value="4">Butters & Eggs</option>
                                        <option value="5">Camera & Video </option>
                                        <option value="6">Mornitors</option>
                                        <option value="7">Tablets</option>
                                        <option value="8">Laptops</option>
                                        <option value="9">Handbags</option>
                                        <option value="10">Headphone & Speaker</option>
                                        <option value="11">Herbs & botanicals</option>
                                        <option value="12">Vegetables</option>
                                        <option value="13">Shop</option>
                                        <option value="14">Laptops & Desktops</option>
                                        <option value="15">Watchs</option>
                                        <option value="16">Electronic</option>
                                    </select>
                                </div>
                                <div class="search_box">
                                    <input placeholder="Search product..." type="text">
                                    <button type="submit"><i class="icon-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="call-support">
                            <p>Call Support: <a href="tel:(+800)123456789">(+800) 123 456 789</a></p>
                        </div>
                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children active">
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Shop</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children">
                                            <a href="#">Shop Layouts</a>
                                            <ul class="sub-menu">
                                                <li><a href="shop.html">shop</a></li>
                                                <li><a href="shop-fullwidth.html">Full Width</a></li>
                                                <li><a href="shop-fullwidth-list.html">Full Width list</a></li>
                                                <li><a href="shop-right-sidebar.html">Right Sidebar </a></li>
                                                <li><a href="shop-right-sidebar-list.html"> Right Sidebar list</a></li>
                                                <li><a href="shop-list.html">List View</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">other Pages</a>
                                            <ul class="sub-menu">
                                                <li><a href="cart.html">cart</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="my-account.html">my account</a></li>
                                                <li><a href="404.html">Error 404</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Product Types</a>
                                            <ul class="sub-menu">
                                                <li><a href="product-details.html">product details</a></li>
                                                <li><a href="product-sidebar.html">product sidebar</a></li>
                                                <li><a href="product-grouped.html">product grouped</a></li>
                                                <li><a href="variable-product.html">product variable</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">blog</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog.html">blog</a></li>
                                        <li><a href="blog-details.html">blog details</a></li>
                                        <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                        <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                    </ul>

                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">pages </a>
                                    <ul class="sub-menu">
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="services.html">services</a></li>
                                        <li><a href="faq.html">Frequently Questions</a></li>
                                        <li><a href="contact.html">contact</a></li>
                                        <li><a href="login.html">login</a></li>
                                        <li><a href="404.html">Error 404</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="my-account.html">my account</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="about.html">about Us</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="contact.html"> Contact Us</a>
                                </li>
                            </ul>
                        </div>

                        <div class="offcanvas_footer">
                            <span><a href="#"><i class="fa fa-envelope-o"></i> info@yourdomain.com</a></span>
                            <ul>
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <!--offcanvas menu area end-->
    <header>
        <div class="main_header">
            <!-- <div class="header_top">
                <div class="container">
                    <div class="row align-items-center">
                       <div class="col-lg-7 col-md-7">
                           <div class="welcome-text">
                               <p>Free Delivery: Take advantage of our time to save event</p>
                           </div>
                       </div>
                        <div class="col-lg-5 col-md-5">
                            <div class="language_currency text-right">
                                <ul>
                                    <li class="currency"><a href="#"> USD <i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown_currency">
                                            <li><a href="#">EUR</a></li>
                                            <li><a href="#">GPB</a></li>
                                            <li><a href="#">RUP</a></li>
                                        </ul>
                                    </li>
                                    <li class="language"><a href="#"> English <i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown_language">
                                            <li><a href="#">French</a></li>
                                            <li><a href="#">Spanish</a></li>
                                            <li><a href="#">Russian</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="header_middle">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-3 col-4">
                            <div class="logo">
                                <a href="index.html"><img src="{!! asset('frontEnd/img/logo/logo.png')!!}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-6 col-6">
                            <div class="header_right_info">
                                <div class="search_container">
                                    <form action="/cari/barang" method="POST" autocomplete="off"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="search_box">
                                            <input class="input-cari" name="nama_tanaman" placeholder="Cari Produk..."
                                                type="text">
                                            <button type="submit"><i class="fa fa-search"
                                                    aria-hidden="true"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="header_account_area">
                                    <div class="header_account-list top_links">
                                        <a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
                                        <ul class="dropdown_links">
                                            @if(auth::check())
                                            <li><a href="{{ url('profile') }}">My Account </a></li>
                                            <li><a class="logout" type="button">Logout </a></li>
                                            @else
                                            <li><a class="login" href="{{ url('/login') }}" type="button">Login </a>
                                            </li>

                                            @endif
                                        </ul>
                                    </div>
                                    <!-- <div class="header_account-list header_wishlist">
                                        <a href="wishlist.html"><i class="icon-heart"></i></a>
                                    </div> -->
                                    <div class="header_account-list  mini_cart_wrapper">
                                        <a href="javascript:void(0)"><i class="fa fa-shopping-cart"
                                                aria-hidden="true"></i>
                                            @if(auth::check())

                                            <span class="item_count">{{ AllCheckout() }}</span></a>
                                            @endif
                                        <!--mini cart-->
                                        <div class="mini_cart">
                                            <div class="cart_gallery">
                                                @if(!empty(Auth::user()->id))
                                                @foreach(Checkout() as $t )
                                                <div class="cart_item">
                                                    <div class="cart_img">
                                                        <a href="#"><img
                                                                src="{{ asset('upload/img_barang/'.$t->gambar_sampul) }}"
                                                                alt=""></a>
                                                    </div>
                                                    <div class="cart_info">
                                                        <a href="#">{{ $t->nama_barang }}</a>
                                                        <p>1 x <span> {{ $t->hargaJual }} </span></p>
                                                    </div>
                                                    <div class="cart_remove">
                                                        <a href="#"><i class="icon-x"></i></a>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @endif
                                            </div>
                                            @if(isset(Auth::user()->id))
                                            <div class="mini_cart_footer">
                                                <div class="cart_button">
                                                    <a href="{{ url('/chart') }}"><i class="fa fa-shopping-cart"></i>
                                                        View
                                                        cart</a>
                                                </div>

                                            </div>
                                            @endif
                                        </div>
                                        <!--mini cart end-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header_bottom sticky-header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="categories_menu">
                                <div class="categories_title">
                                    <h2 class="categori_toggle">Kategori</h2>
                                </div>
                                <div class="categories_menu_toggle">
                                    <ul>
                                        @foreach(Kategori() as $t)
                                        <li><a href="{{ url('get/data/'.$t->id_kategori) }}">
                                                {{ $t->nama_kategori }}</a></li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!--main menu start-->
                            <div class="main_menu menu_position">
                                <nav>
                                    <ul>
                                        <li class=" active">
                                            <a href="{{ url('/') }}">Beranda</a>
                                        </li>
                                        <li class="mega_items"><a href="{{ url('/fullShop') }}">Produk</a>
                                        <li><a href="#">Halaman <i class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu pages">
                                                <li><a href="{{ url('/ProdukTerjual') }}">Produk Terjual</a></li>
                                                <li><a href="{{ url('/promo') }}">Promo</a></li>
                                                <li><a href="contact.html">Kontak Kami</a></li>
                                                @if(isset(Auth::user()->id))
                                                <li><a href="{{ url('/myOrder') }}">Pesanan Saya</a></li>
                                                <li><a href="{{ url('/chart') }}">Keranjang</a></li>
                                                @endif
                                            </ul>
                                        </li>
                                        <li><a href="{{ url('artikel/plantshop') }}"> Artikel</a></li>
                                        <li><a href="{{ url('bank_data') }}">Bank Data</a></li>
                                        <li><a href="{{ url('/about/toko') }}">Tentang</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!--main menu end-->
                        </div>
                        <div class="col-lg-3">
                            <div class="call-support">
                                <p>Layanan: <a href="tel:(+800)123456789"> (+62)85730982703</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--header area end-->
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            @if(Auth::check() && Auth::user()->foto_profile == null && Auth::user()->tanggal_lahir == null )
            <div class="alert alert-danger" style="margin-top:15px;">
                <button type="button" class="close" data-dismiss="alert">×</button>
                Silahkan Lengkapi Profil anda. <a href="{{ url('profile') }}">Klik Disini</a>
            </div>
            @endif
          
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
            @section('konten')
            @show

        </div>
    </div>

    <!--footer area start-->
    <footer class="footer_widgets">
    
        <div class="footer_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 text-center">
                        <div class="copyright_area">
                            <p>Copyright &copy; 2021 <a href="#">Plantshop.id</a> All Right Reserved.</p>
                        </div>
                    </div>
                    <!-- <div class="col-lg-6 col-md-6">
                        <div class="footer_payment">
                            <a href="#"><img src="{{ asset('frontEnd/img/icon/payment.png' ) }}" alt=""></a>
                        </div> -->
                </div>
            </div>
        </div>
        </div>
    </footer>
    <!--footer area end-->

    <!-- modal area start-->
    <div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-x"></i></span>
                </button>
                <div class="modal_body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-12">
                                <div class="modal_tab">
                                    <div class="tab-content product-details-large">
                                        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img
                                                        src="{{ asset('frontEnd/img/product/productbig1.jpg' ) }}"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab2" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img
                                                        src="{{ asset('frontEnd/img/product/productbig2.jpg' ) }}"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab3" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img
                                                        src="{{ asset('frontEnd/img/product/productbig3.jpg' ) }}"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab4" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img
                                                        src="{{ asset('frontEnd/img/product/productbig4.jpg' ) }}"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal_tab_button">
                                        <ul class="nav product_navactive owl-carousel" role="tablist">
                                            <li>
                                                <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab"
                                                    aria-controls="tab1" aria-selected="false"><img
                                                        src="{{ asset('frontEnd/img/product/product1.jpg' ) }}"
                                                        alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-toggle="tab" href="#tab2" role="tab"
                                                    aria-controls="tab2" aria-selected="false"><img
                                                        src="{{ asset('frontEnd/img/product/product2.jpg' ) }}"
                                                        alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link button_three" data-toggle="tab" href="#tab3"
                                                    role="tab" aria-controls="tab3" aria-selected="false"><img
                                                        src="{{ asset('frontEnd/img/product/product3.jpg' ) }}"
                                                        alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-toggle="tab" href="#tab4" role="tab"
                                                    aria-controls="tab4" aria-selected="false"><img
                                                        src="{{ asset('frontEnd/img/product/product8.jpg' ) }}"
                                                        alt=""></a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <div class="modal_right">
                                    <div class="modal_title mb-10">
                                        <h2>Donec Ac Tempus</h2>
                                    </div>
                                    <div class="modal_price mb-10">
                                        <span class="new_price">$64.99</span>
                                        <span class="old_price">$78.99</span>
                                    </div>
                                    <div class="modal_description mb-15">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste
                                            laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam
                                            in quos qui nemo ipsum numquam, reiciendis maiores quidem aperiam, rerum vel
                                            recusandae </p>
                                    </div>
                                    <div class="variants_selects">
                                        <div class="variants_size">
                                            <h2>size</h2>
                                            <select class="select_option">
                                                <option selected value="1">s</option>
                                                <option value="1">m</option>
                                                <option value="1">l</option>
                                                <option value="1">xl</option>
                                                <option value="1">xxl</option>
                                            </select>
                                        </div>
                                        <div class="variants_color">
                                            <h2>color</h2>
                                            <select class="select_option">
                                                <option selected value="1">purple</option>
                                                <option value="1">violet</option>
                                                <option value="1">black</option>
                                                <option value="1">pink</option>
                                                <option value="1">orange</option>
                                            </select>
                                        </div>
                                        <div class="modal_add_to_cart">
                                            <form action="#">
                                                <input min="1" max="100" step="2" value="1" type="number">
                                                <button type="submit">add to cart</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal_social">
                                        <h2>Share this product</h2>
                                        <ul>
                                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a>
                                            </li>
                                            <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->


    <!-- JS
============================================ -->
    <!--jquery min js-->
    <script src="{{ asset('frontEnd/js/vendor/jquery-3.4.1.min.js') }}"></script>
    <!--popper min js-->
    <script src="{{ asset('frontEnd/js/popper.js') }}"></script>
    <!--bootstrap min js-->
    <script src="{{ asset('frontEnd/js/bootstrap.min.js') }}"></script>
    <!--owl carousel min js-->
    <script src="{{ asset('frontEnd/js/owl.carousel.min.js') }}"></script>
    <!--slick min js-->
    <script src="{{ asset('frontEnd/js/slick.min.js') }}"></script>
    <!--magnific popup min js-->
    <script src="{{ asset('frontEnd/js/jquery.magnific-popup.min.js') }}"></script>
    <!--counterup min js-->
    <script src="{{ asset('frontEnd/js/jquery.counterup.min.js') }}"></script>
    <!--jquery countdown min js-->
    <script src="{{ asset('frontEnd/js/jquery.countdown.js') }}"></script>
    <!--jquery ui min js-->
    <script src="{{ asset('frontEnd/js/jquery.ui.js') }}"></script>
    <!--jquery elevatezoom min js-->
    <script src="{{ asset('frontEnd/js/jquery.elevatezoom.js') }}"></script>
    <!--isotope packaged min js-->
    <script src="{{ asset('frontEnd/js/isotope.pkgd.min.js') }}"></script>
    <!--slinky menu js-->
    <script src="{{ asset('frontEnd/js/slinky.menu.js') }}"></script>
    <!-- Plugins JS -->
    <script src="{{ asset('frontEnd/js/plugins.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('frontEnd/js/main.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/koment.js') }}"></script>
    <script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $('#danger').modal('show');
        $(".logout").click(function () {
            axios.post('/logout')
                .then(() => location.href = '/')
        });

    </script>

    <script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }}"></script>

    <!-- <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script> -->
    @yield('js')


</body>


<!-- Mirrored from demo.hasthemes.com/lukani-preview-v1/lukani/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Dec 2020 11:42:23 GMT -->

</html>
