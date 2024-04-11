<x-layouts.app title="Galeri Kami">
    @push('styles')
        <style>
            .img-gallery {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .py-5 {
                padding-top: 3rem;
                padding-bottom: 3rem;
            }

            .mb-4 {
                margin-bottom: 1.5rem;
            }
        </style>

        <link rel="stylesheet" href="{{ asset('app/plugins/lightbox/css/lightbox.css') }}">
    @endpush

    <section class="inner-banner">
        <div class="container text-center">
            <h3>Galeri Kami</h3>
            <div class="breadcumb">
                <a href="#">Home</a>
                <span class="sep">-</span>
                <span class="page-name">Galeri Kami</span>
            </div>
        </div>
    </section>

    <div class="container py-5">
        <div class="row">
            @foreach ($galleries as $gallery)
            <div class="col-md-4 col-sm-6 col-6 mb-4">
                <a href="{{ asset('storage/' . $gallery->image) }}" class="d-block" data-lightbox="gambar">
                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="image" class="img-gallery">
                </a>
            </div>
            @endforeach
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('app/plugins/lightbox/js/lightbox.js') }}"></script>

        <script>
            lightbox.option({
                'resizeDuration': 200,
                'wrapAround': true
            })
        </script>
    @endpush
</x-layouts.app>
