<x-layouts.app title="{{ $service->name }}">
    <section class="inner-banner">
        <div class="container text-center">
            <h3>
                {{ $service->name }}
            </h3>
            <div class="breadcumb">
                <a href="#">Home</a><!--
                --><span class="sep">-</span><!--
                --><span class="page-name">
                    {{ $service->name }}
                </span>
            </div><!-- /.breadcumb -->
        </div><!-- /.container -->
    </section><!-- /.inner-banner -->

    <section class="single-service-page sec-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="has-left-sidebar">
                        <div class="single-service-page-content">
                            <h3>
                                {{ $service->name }}
                            </h3>
                            <p>
                                {{ $service->description }}
                            </p>
                            <br />
                            <div class="single-service-carousel owl-theme owl-carousel">
                                @foreach ($service->images as $image)
                                    <div class="item">
                                        <img src="{{ asset('storage/' . $image->image) }}" alt="Awesome Image"/>
                                    </div><!-- /.item -->
                                @endforeach
                            </div><!-- /.single-service-carousel -->
                        </div><!-- /.single-service-page-content -->
                    </div><!-- /.has-left-sidebar -->
                </div><!-- /.col-md-8 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.single-service-page-content -->
</x-layouts.app>
