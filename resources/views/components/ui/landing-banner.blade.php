<div id="minimal-bootstrap-carousel" class="carousel slide carousel-fade slider-home-two" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        @foreach ($banners as $banner)
            <div class="item {{ $loop->first ? 'active' : '' }} slide-1" style="background-image: url({{ asset('storage/' . $banner->image) }});background-position: right center;">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="box valign-middle">
                            <div class="content text-left">
                                <h2 data-animation="animated fadeInUp">{{ $banner->title }}</h2>
                                <p data-animation="animated fadeInDown">{{ $banner->subtitle }}</p>
                                <a href="{{ $banner->url }}" class="banner-btn" data-animation="animated fadeInDown">{{ $banner->text_url }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#minimal-bootstrap-carousel" role="button" data-slide="prev">
        <i class="fas fa-angle-left"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#minimal-bootstrap-carousel" role="button" data-slide="next">
        <i class="fas fa-angle-right"></i>
        <span class="sr-only">Next</span>
    </a>

    <ul class="carousel-indicators list-inline custom-navigation">

        @foreach ($banners as $banner)
            <li data-target="#minimal-bootstrap-carousel" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
        @endforeach
    </ul>

</div>
