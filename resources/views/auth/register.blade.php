<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assetLogin/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assetLogin/css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assetLogin/css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('assetLogin/css/style.css') }}">
    
    <title>Registrasi Plantshop.id</title>
</head>

<body>
    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('assetLogin/images/bg_1.jpg');"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-9">
                        <h3>Register to <strong>Plantshop</strong></h3>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-12 col-form-label text-md-left">Nama Lengkap</label>

                                <div class="col-md-12">
                                    <input id="name" type="text"
                                        class="form-control form-control-sm @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-12 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-12">
                                    <input id="email" type="email"
                                        class="form-control form-control-sm @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-12 col-form-label text-md-left">{{ __('Password') }}</label>

                                <div class="col-md-12">
                                    <input id="password" type="password"
                                        class="form-control form-control-sm @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-12 col-form-label text-md-left">{{ __('Confirm Password') }}</label>

                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control form-control-sm"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="d-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-0"><a href="{{ url('login') }}"
                                        class="forgot-pass">Login..?</a>
                                </label>
                                <!-- <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> -->
                            </div>

                            <input type="submit" value="Create" class="btn btn-block btn-primary">

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>



    <script src="{{ asset('assetLogin/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assetLogin/js/popper.min.js') }}"></script>
    <script src="{{ asset('assetLogin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assetLogin/js/main.js') }}"></script>
</body>

</html>
