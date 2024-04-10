<x-layouts.app title="Galeri Kami">
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

    <div class="container mt-5 mb-5">
        <div class="row ">
            @foreach ($galleries as $gallery)
            <div class="col-md-4 col-sm-6 col-6 mb-3">
                <a href="{{ asset('storage/' . $gallery->image) }}" class="d-block" data-lightbox="gambar">
                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="image" class="img-gallery">
                </a>

            </div>
            @endforeach
        </div>
    </div>
</x-layouts.app>
