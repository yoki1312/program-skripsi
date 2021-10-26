<!DOCTYPE html>
<html>

<head>
    <title>Plantshop.id</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col-sm-4">
            <img src="{{ $message->embed('v2/img/logo.png') }}" width="162" height="35" alt="">
        </div>
        <div class="col-sm-4"></div>
        <h1>{{ $details['title'] }}</h1>
        <p>{{ $details['body'] }}</p>

    </div>

    <p>Thank you</p>
</body>

</html>
