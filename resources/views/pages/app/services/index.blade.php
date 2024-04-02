<x-layouts.app title="Layanan">
    <section class="inner-banner">
        <div class="container text-center">
            <h3>Layanan</h3>
            <div class="breadcumb">
                <a href="#">Home</a>
                <span class="sep">-</span>
                <span class="page-name">Layanan</span>
            </div>
        </div>
    </section>

    <section class="service-style-one sec-pad service-page">
        <div class="container">
            <div class="row">
                @foreach ($services as $service)
                    <div class="col-md-4 col-sm-6 col-xs-12">
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
</x-layouts.app>
