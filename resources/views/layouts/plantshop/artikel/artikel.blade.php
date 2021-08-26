@extends('layouts.plantshop.template_view')
@section('konten')
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li>Artikel</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="blog_page_section blog_reverse m" style="margin-bottom:50px; margin-top:50px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <div class="blog_wrapper blog_wrapper_sidebar">
                    @foreach($artikel as $t)
                    <article class="single_blog">
                        <figure>
                            <div class="blog_thumb">
                                <a href="blog-details.html"><img src="{{ asset('upload/artikel/'.$t->foto_tips) }}"
                                        alt=""></a>
                            </div>
                            <figcaption class="blog_content">
                                <h4 class="post_title"><a href="blog-details.html"><i
                                            class="fa fa-paper-plane"></i>{{ $t->judul }}</a></h4>
                                <div class="blog_meta">
                                    <p>Oleh <a href="#">admin</a> / Tanggal <a
                                            href="#">{{ date('d F Y', strtotime($t->created_at)) }}</a></p>
                                </div>
                                <p class="post_desc">{!! $t->isi !!}</p>
                                <footer class="btn_more">
                                    <a  href="{{ url('detail/artikel/'.$t->id_tips) }}"> Baca Selengkapnya</a>
                                </footer>
                            </figcaption>
                        </figure>
                    </article>
                    @endforeach
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                {{ $artikel->links() }}

            </div>
        </div>
    </div>
</div>
@endsection
