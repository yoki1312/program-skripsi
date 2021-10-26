@extends('v2.index')
@section('konten_area')
<main class="bg_gray" style="margin:150px 0px 150px 0px;">

    <div id="error_page">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-7 col-lg-9">
                    <figure><img src="{{ asset('v2/img/404.svg') }}" alt="" class="img-fluid" width="550" height="234">
                    </figure>
                    <p>Page Maintance </p>

                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /error -->
</main>
@endsection
