<section class="blog-style-two sec-pad">
    <div class="container">
        <div class="sec-title">
            <div class="d-flex justify-content-between align-items-center">
                <h3>Recent News</h3>

                <a href="#" class="thm-btn text-white">More News</a>
            </div>
        </div>
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-blog-style-two">
                        <div class="img-box">
                            <img src="{{ asset($blog->thumbnail_url) }}" alt="Awesome Image" />
                            <a href="" class="read-more">Read Post</a>
                        </div>
                        <div class="text-box">
                            <div class="meta-info">
                                <a href="#"><i class="fas fa-clock"></i> {{ $blog->created_at->format('M d') }}</a>
                            </div>
                            <a href="">
                                <h3>{{ $blog->title }}</h3>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
