<section class="service-style-one sec-pad">
    <div class="container">
        <div class="sec-title">
            <div class="d-flex justify-content-between align-items-center">
                <h3>Apa yang kami tawarkan</h3>
                <a href="#" class="thm-btn bordered">
                    Lihat Semua
                </a>
            </div>
        </div>
        <div class="service-carousel-one owl-theme owl-carousel">
            @foreach ($services as $service)
                <div class="item">
                    <div class="single-service-style-one">
                        <div class="img-box">
                            <img src="{{ asset($service->thumbnail_url) }}" alt="Awesome Image" />
                            <a href="{{ route('app.service', $service->slug) }}" class="read-more fas fa-link"></a>
                        </div>
                        <div class="content-box">
                            <a href="{{ route('app.service', $service->slug) }}">
                                <h3>{{ $service->name }}</h3>
                            </a>
                            <p>{{ $service->excerpt }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
