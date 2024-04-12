@push('styles')
    <style>
        .client-carousel-wrapper {
            padding: 50px 0;
            background-color: #f9f9f9;
        }

        .client-carousel {
            display: flex !important;
            align-items: center !important;
        }

        .client-carousel .item {
            padding: 0 10px;
        }

        .client-carousel .item img {
            width: 100px;
            height: 100px;
            object-fit: contain;
            opacity: 0.5;
            object-position: center;
            transition: opacity 0.3s;

        }

        .client-carousel .item img:hover {
            opacity: 1;
        }
    </style>
@endpush

@if($clients->isNotEmpty())
    <div class="client-carousel-wrapper">
        <div class="container">
            <div class="client-carousel owl-carousel owl-theme">
                @foreach ($clients as $client)
                    @if($client->logo)
                        <div class="item">
                            <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}">
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function () {
                $('.client-carousel').owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: false,
                    dots: false,
                    autoplay: true,
                    autoplayTimeout: 2000,
                    autoplayHoverPause: true,
                    responsive: {
                        0: {
                            items: 2
                        },
                        600: {
                            items: 3
                        },
                        1000: {
                            items: 5
                        }
                    }
                });
            });

        </script>
    @endpush
@endif
