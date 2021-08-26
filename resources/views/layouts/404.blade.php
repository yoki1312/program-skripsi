@extends('layouts.plantshop.template_view')
@section('konten')
<div class="error_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="error_form">
                    <h1>404</h1>
                    <h2>Maaf!</h2>
                    <p>Anda tidak memiliki akses untuk membuka halaman tersebut.</p>
                    <a href="{{ url('/') }}">Back to home page</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
