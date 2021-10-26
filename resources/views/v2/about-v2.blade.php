@extends('v2.index')
@section('konten_area')
<main style="margin-top:70px">
    <div class="hero_single inner_pages background-image" data-background="url(v2/img/barside.png)">
        <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-10 col-md-8">
                        <h1>Plantshop.id</h1>
                        <p><b>Plant for Happines</b></p>
                    </div>
                </div>
                <!-- /row -->
            </div>
        </div>
        <div class="wave gray hero"></div>
    </div>
    <!-- /hero_single -->

    <div class="bg_gray">
        <div class="container margin_60_40">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="box_contacts">
                        <img style="width:100%; height:500px;" src="{{ asset('upload/about/'.toko()->gambar) }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box_contacts">
							<h4>Plantshop.id</h4>
                               <p>{{ toko()->about }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box_contacts">
                                <i class="icon_lifesaver"></i>
                                <h2>Pusat Bantuan</h2>
                                <a href="#0">{{ toko()->kontak }}</a> - <a href="#0">{{ toko()->email }}</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box_contacts">
                                <i class="icon_pin_alt"></i>
                                <h2>Alamat</h2>
                                <div>{{ toko()->alamat }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bg_gray -->
	<style>
		.frame-maps iframe{
			width: 100%;
		}
	</style>
    <div class="container margin_60_20">
        <h5 class="mb_5">Lokasi</h5>
        <div class="row">
            <div class="col-lg-12 col-md-12 add_bottom_25 frame-maps">
			{!! toko()->maps !!}
            </div>
        </div>
    </div>
    <!-- /row -->
    </div>
    <!-- /container -->

</main>
@endsection
