
    @foreach($data as $d)
    <div class="col-md-6 section-artikel-check">
        <article class="blog">
            <figure>
                <a href="{{ url('detail/artikel-V2/'.$d->id_tips) }}"><img src="{{ asset('upload/artikel/'.$d->foto_tips) }}" alt="">
                    <div class="preview"><span>Baca Selengkapnya</span></div>
                </a>
            </figure>
            <div class="post_info">
                <small>{{$d->nama_kategori}} - {{ date('d F Y', strtotime($d->created_at)) }}</small>
                <h2><a href="{{ url('detail/artikel-V2/'.$d->id_tips) }}">{{ $d->judul }}</a></h2>
                <!-- <p>{!! $d->isi !!}</p> -->
                <ul>
                    <li>
                        <div class="thumb"><img src="{{ asset('upload/artikel/'.$d->foto_tips) }}" alt=""></div> Admin
                    </li>
                    <li><i class="icon_comment_alt"></i>{{ $d->total_komentar }}</li>
                </ul>
            </div>
        </article>
        <!-- /article -->
    </div>

    @endforeach
<div class="pagination_fg">
    <ul>{{ $data->links('pagination::bootstrap-4') }}</ul>
</div>
