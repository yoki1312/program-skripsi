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
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <title>Login Plantshop.id</title>
</head>

<body>
    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('assetLogin/images/bg_1.jpg');"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        <h3>Login to <strong>Plantshop</strong></h3>

                        <form method="POST" action="{{ route('loginUser') }}">
                            @csrf
                            <div class="form-group first">
                                <label for="username">E-mail</label>
                                <input type="text" name="email" class="form-control" placeholder="your-email@gmail.com"
                                    id="username">
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Your Password"
                                    id="password">
                            </div>

                            <div class="d-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-0"><a href="{{ url('register') }}"
                                        class="forgot-pass">Register..?</a>
                                </label>
                                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                            </div>

                            <input type="submit" value="Log In" class="btn btn-block btn-primary">

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
