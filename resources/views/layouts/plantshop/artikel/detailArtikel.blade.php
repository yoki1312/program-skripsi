@extends('layouts.plantshop.template_view')
@section('konten')
@foreach($artikel as $t)
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.html">Detail</a></li>
                        <li>Artikel</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blog_details">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!--blog grid area start-->
                <div class="blog_wrapper blog_wrapper_details">
                    <article class="single_blog">
                        <figure>
                            <div class="post_header">
                                <h3 class="post_title">{{ $t->judul }}</h3>
                                <div class="blog_meta">
                                    <p>Posted by : <a href="#">admin</a> / On : <a
                                            href="#">{{ date('d F Y', strtotime($t->created_at)) }}</a></p>
                                </div>
                            </div>
                            <div class="blog_thumb">
                                <a href="#"><img src="{{ asset('upload/artikel/'.$t->foto_tips) }}" alt=""></a>
                            </div>
                            <figcaption class="blog_content">
                                <div class="post_content">
                                    <p>{!! $t->isi !!}</p>
                                    <hr>
                                </div>
                            </figcaption>
                        </figure>
                    </article>
                  
                    <div class="comments_box">
                        <h3>{{ $total_komentar }} Comments </h3>
                        @foreach($komentar as $y)
                        <div class="comment_list">
                            <div class="comment_thumb">
                                <img src="{{ asset('default.jpg') }}" alt="">
                            </div>
                            <div class="comment_content">
                                <div class="comment_meta">
                                    <h5><a href="#">{{ $y->name }}</a></h5>
                                    <span>{{ date('d F Y',strtotime($y->created_at)) }}</span>
                                </div>
                                <p>{{ $y->komentar }}</p>

                            </div>

                        </div>
                        @endforeach

                    </div>
                    @if(isset(Auth::user()->id))
                    <div class="comments_form">
                        <h3>Leave a Reply </h3>
                        <p>Your email address will not be published. Required fields are marked *</p>

                        <form action="/koment/artikel" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-12">
                                    <input type="hidden" value="{{ $t->id_tips }}" name="id_tips" />
                                    <label for="review_comment">Comment </label>
                                    <textarea name="komentar" id="review_comment"></textarea>
                                </div>
                            </div>
                            <button class="button" type="submit">Post Comment</button>
                        </form>

                    </div>
                    @endif
                </div>
                <!--blog grid area start-->
            </div>

        </div>
    </div>
</div>
@endforeach
@endsection
