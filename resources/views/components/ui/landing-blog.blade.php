<section class="blog-style-two sec-pad">
    <div class="container">
        <div class="sec-title">
            <div class="d-flex justify-content-between align-items-center">
                <h3>Berita Terbaru</h3>

                <a href="{{ route('app.blogs') }}" class="thm-btn text-white">Lihat Semua</a>
            </div>
        </div>
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-blog-style-two">
                        <div class="img-box">
                            <img src="{{ asset($blog->thumbnail_url) }}" alt="Awesome Image" />
                            <a href="{{ route('app.blog', $blog->slug) }}" class="read-more">Baca Berita</a>
                        </div>
                        <div class="text-box">
                            <div class="meta-info">
                                <a href="{{ route('app.blog', $blog->slug) }}"><i class="fas fa-clock"></i> {{ $blog->created_at->format('M d') }}</a>
                            </div>
                            <a href="{{ route('app.blog', $blog->slug) }}">
                                <h3>{{ $blog->title }}</h3>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
