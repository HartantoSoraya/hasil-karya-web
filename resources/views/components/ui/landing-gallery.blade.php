<section class="blog-style-two sec-pad">
    <div class="container">
        <div class="sec-title">
            <div class="d-flex justify-content-between align-items-center">
                <h3>Galeri Kami</h3>

                <a href="{{ route('app.galleries') }}" class="thm-btn text-white">Lihat Semua</a>
            </div>
        </div>
        <div class="row">
            @foreach ($galleries as $gallery)
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-blog-style-two">
                        <div class="img-box">
                            <img src="{{ asset('storage/' . $gallery->image) }}" alt="Awesome Image" />
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
